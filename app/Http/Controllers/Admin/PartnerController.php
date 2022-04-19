<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NotifyEmailPartnerActivate;
use App\Mail\NotifyEmailPartnerBlocked;
use App\Models\RequestCahngePartnerInfo;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PartnerRegions;
use App\Models\PartnerWantJobs;
use App\Models\Subscriptions;
//use App\Models\Setting;
//use App\Models\Proposal;
use Carbon\Carbon;
use Mail;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $partners = User::getPartners();
        return view('admin.partners.partners-list',compact(['partners']));
    }

    public function showUpdateRequest(User $partner, RequestCahngePartnerInfo $requestCahngePartnerInfo)
    {
        return view('admin.partners.request-update',compact('requestCahngePartnerInfo','partner'));
    }

    public function updateRequest(User $partner, RequestCahngePartnerInfo $requestCahngePartnerInfo)
    {

        $partner->requestChangeInfo()->update(['status'=>2]);

        $partner->update(request()->all());
        $requestCahngePartnerInfo->status = request()->action == 'accept' ? 3 : 2;
        $requestCahngePartnerInfo->json_info = json_encode(request()->all());
        $requestCahngePartnerInfo->save();

        return redirect(route('partners.edit',$partner->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $partner)
    {
        $requestsChangeInfo = $partner->requestChangeInfo()->get();
		$proposals = $partner->getProposalsByStatus(1)->get();

        $regions = app()->make(PartnerRegions::class);
        $regions = $regions->getCheckedRegionByUser($partner->id);

        $typesofjobs = app()->make(PartnerWantJobs::class);
        $typesofjobs = $typesofjobs->getCheckedTypesJobByUser($partner->id);

        $subscriptions = Subscriptions::all();

        return view('admin.partners.partners-edit',compact(['partner','proposals','regions','typesofjobs','requestsChangeInfo','subscriptions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $partner)
    {

        if ($request->active == 1 && $partner->active == 0) {
            $mailable = new NotifyEmailPartnerActivate();
            Mail::to($partner->email)->queue($mailable);
        }

        if ($request->status == 2 && $partner->status != 2) {
            $mailable = new NotifyEmailPartnerBlocked();
            Mail::to($partner->email)->queue($mailable);
        }


        if(isset($request->types_of_jobs)){
            $partner->typesJobs()->delete();
            foreach($request->types_of_jobs as $job){
                PartnerWantJobs::insert([
                    'user_id'=> $partner->id,
                    'type_job_id'=> $job,
                ]);
            }
        }

        if(isset($request->region_ids)){
            $partner->regions()->delete();
            foreach($request->region_ids as $region){
                PartnerRegions::insert([
                    'user_id'=> $partner->id,
                    'region_id'=> $region,
                ]);
            }
        }

        $partner->subscription_id = $request->subscription_id;
        $partner->house = $request->house;
        $partner->coins = $request->coins;
        $partner->city = $request->city;
        $partner->street = $request->street;
        $partner->postcode = $request->postcode;
        $partner->status = $request->status;
        $partner->name = $request->name;
        $partner->lastname = $request->lastname;
        $partner->company = $request->company;
        $partner->email = $request->email;
        $partner->phone = $request->phone;
        $partner->status_pay = $request->status_pay;
        $partner->active = $request->active;
        $partner->save();


       /* if ($request->active == 1) {

            if (Setting::getByKey('system.setting.autosearch_proposal') == 1) {
                $startDate = Carbon::now()->addDays(1)->format('Y/m/d');

                $proposals = Proposal::whereIn('region_id',  $request->region_ids)
                    ->where('date_start', '>=', $startDate)
                    ->whereIn('type_job_id', $request->types_of_jobs)
                    ->inRandomOrder()
                    ->limit(Setting::getByKey('system.setting.limit_proposal_to_partner_after_register'))
                    ->pluck('id');



                foreach ($proposals as $proposal_id) {
                    ProposalToPartner::insert([
                        'proposal_id' => $proposal_id,
                        'user_id' => $partner->id
                    ]);
                }
                Log::info('Searched for condition...IDS: ' . json_encode($proposals));
            }


        } */

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $partner)
    {
       $partner->getProposalsToPartner()->delete();
       $partner->getReviews()->delete();
       $partner->getInvoices()->delete();
	   $partner->delete();
	   return back();
    }

    public function updateRequestDelete(RequestCahngePartnerInfo $requestCahngePartnerInfo)
    {
        $requestCahngePartnerInfo->delete();
	    return back();
    }
}
