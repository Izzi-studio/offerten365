<?php

namespace App\Http\Controllers;

use App\Events\NewProposal;
use App\Events\ProposalAccepted;
use App\Events\ProposalDelete;
use App\Helper\GenerateInvoices;
use App\Models\ProposalToPartner;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Proposal;
use Auth;
use Log;
use PDF;
use App\Models\Regions;

class ProposalController extends Controller
{

    public function store(Request $request)
    {

        $proposal = $request->only('proposal')['proposal'];

        $proposal['user_id'] = auth()->user()->id;
        $proposal['additional_info'] = $request->only('additional_info')['additional_info'];

        event(new NewProposal(Proposal::create($proposal)));

        return response()->json(['url'=> route('client.success.register')]);
    }
    /**
     * Process Proposal.
     * @param  string $action
     * @param  Proposal $proposal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processProposals(Proposal $proposal, $action)
    {
        $authUser = auth()->user();
        $status = $action == 'accepted' ? 1 : 2;

        $proposalToPartner = ProposalToPartner::where('user_id',$authUser->id)
            ->where('proposal_id',$proposal->id)
            ->firstOrFail();

        $price = 0;
        switch ($proposal['type_job_id']) {
            case 1:
                $price = Setting::getByKey('system.price.'.auth()->user()->subscription_id.'.cost_transfer');
                break;
            case 2:
                $price = Setting::getByKey('system.price.'.auth()->user()->subscription_id.'.cost_cleaning');
                break;
            case 3:
                $price = Setting::getByKey('system.price.'.auth()->user()->subscription_id.'.cost_transfer_cleaning');
                break;
            case 4:
                $price = Setting::getByKey('system.price.'.auth()->user()->subscription_id.'.cost_malar');
                break;
            default:
                Log::info('Wrong Job Type on pay: '.$proposal['type_job_id']);
        }


        if($status == 1) {
            if ($authUser->status != 1 && $authUser->status != 2) {


				if($authUser->status_pay == 1){

					 if($authUser->coins - $price >= 0) {
						$authUser->coins = $authUser->coins - $price;
						$authUser->save();
					 }else{
						return back()->withErrors(['no_coin'=>__('front.no_coin')]);
					 }
				}

				$proposalToPartner->status = $status;
                $proposalToPartner->save();

                Log::info('Partner ID: ' . $authUser->id . ', Name: ' . $authUser->name . ' PAY Proposal ID: ' . $proposal->id.' Price: '.$price);
                event(new ProposalAccepted($proposal));
                Log::info('----DONE----');

                $proposalToPartners = ProposalToPartner::where('proposal_id', $proposal->id)
                    ->where('status', 1);

                if (Setting::getByKey('system.setting.limit_responded') <= $proposalToPartners->count()) {
                    ProposalToPartner::where('proposal_id', $proposal->id)
                        ->where('status', 0)
                        ->forceDelete();
                }
                return redirect()->route('partner.getAcceptedRequests');

            }else{
                return back()->withErrors(['no_paid_invoice'=>__('front.no_paid_invoice')]);
            }
        }
        $proposalToPartner->status = $status;
        $proposalToPartner->save();

        return  redirect()->route('partner.getRejectedRequests');
    }

    public function delete (Proposal $proposal){
		event(new ProposalDelete($proposal));

        $proposal->getReviews()->delete();
        $proposal->getReceivedInvitation()->forceDelete();
        $proposal->forceDelete();



        return back();
    }

    public function downloadProposals(Proposal $proposal){

        $cost = 0;
        switch ($proposal->type_job_id) {
            case 1:
                $cost = Setting::getByKey('system.price.'.auth()->user()->subscription_id.'.cost_transfer');
                break;
            case 2:
                $cost= Setting::getByKey('system.price.'.auth()->user()->subscription_id.'.cost_cleaning');
                break;
            case 3:
                $cost = Setting::getByKey('system.price.'.auth()->user()->subscription_id.'.cost_transfer_cleaning');
                break;
            case 4:
                $cost = Setting::getByKey('system.price.'.auth()->user()->subscription_id.'.cost_malar');
                break;
            default:
                Log::info('Wrong Job Type on pay: '.$proposal->type_job_id);
        }


        $pdf = PDF::loadView('front.partner.proposalPDF',compact(['proposal','cost']));

        return $pdf->download('anfragen_'. $proposal->date_start->format('Y-m-d') .'.pdf');
    }

    public function tts(){
        $generator = app()->make(GenerateInvoices::class);

        $generator->generateAndSendInvoices();

    }

	public function edit(Proposal $proposal){
		 $authUser = auth()->user();
		 if($proposal->user_id != $authUser->id ){
			 abort(404);
		 }
		//dd($proposal);
		$regions = Regions::all();

		 switch ($proposal['type_job_id']) {
            case 1:
                $view = 'transfer-form';
                break;
            case 2:
                $view = 'cleaning-form';
                break;
            case 3:
                $view = 'transfer-cleaning-form';
                break;
            case 4:
                $view = 'painting-form';
                break;
            default:
                Log::info('Edit Request. Wrong Job Type: '.$proposal['type_job_id']);
        }

		return view('front.client.edit.'.$view,compact(['proposal','regions']));
	}

	public function update(Request $request,Proposal $proposal){


        $proposalData = $request->only('proposal')['proposal'];
        $proposalData['additional_info'] = $request->only('additional_info')['additional_info'];

		$proposal->update($proposalData);

        switch ($proposal['type_job_id']) {
            case 1:
                $route = route('client.getTRequests');
                break;
            case 2:
                $route = route('client.getCRequests');
                break;
            case 3:
                $route = route('client.getTCRequests');
                break;
            case 4:
                $route = route('client.getPWRequests');
                break;
            default:
                Log::info('Add Request. Wrong Job Type: '.$proposal['type_job_id']);
                return response()->json(['url'=> route('client.myInfo')]);
        }

		 return response()->json(['url'=> $route]);
	}

}
