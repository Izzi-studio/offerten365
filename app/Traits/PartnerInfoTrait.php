<?php
namespace App\Traits;
use App\Events\EmailChangeInfoPartner;
use App\Models\InvoiceToUser;
use App\Models\PartnerRegions;
use App\Models\PartnerWantJobs;
use App\Models\SeoMetaTags;
use Illuminate\Http\Request;
use Str;
use Hash;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\RequestCahngePartnerInfo;

trait PartnerInfoTrait{



    /**
     * Display form password.
     *
     * @return \Illuminate\Http\Response
     */
    public function myInfo()
    {
		if(!$this->active()){
			 return view('front.partner.noactive');
		}

        app()->make(SeoMetaTags::class)->setMeta('system.partner.my_info');
        $regions = app()->make(PartnerRegions::class);
        $regions = $regions->getCheckedRegionByUser(auth()->user()->id);

        $typesofjobs = app()->make(PartnerWantJobs::class);
        $typesofjobs = $typesofjobs->getCheckedTypesJobByUser(auth()->user()->id);


        return view('front.partner.cabinet-my-info',compact(['regions','typesofjobs']));
    }

    /**
     * Update profile partner
     * @param  Request $request
     * @return Illuminate\Http\RedirectRespons
     */
    public function updateInfo(Request $request){

        $this->validate($request, [
            'region_ids' => ['required','array'],
            'types_of_jobs' => ['required','array'],
            'name' => ['required'],
            'company' => ['required'],
            'lastname' => ['required'],
            'phone' => ['required'],
            'city' => ['required'],
            'street' => ['required'],
            'house' => ['required'],
            'postcode' => ['required'],
        ]);

        //auth()->user()->update($request->only('name','lastname','company','phone'));
        if ($request->new_request_update === 'true') {
            RequestCahngePartnerInfo::create([
                'user_id' => auth()->user()->id,
                'json_info' => json_encode($request->only('name', 'lastname', 'company', 'phone', 'city', 'street', 'house', 'postcode')),
            ]);

            event(new EmailChangeInfoPartner(auth()->user()));
        }

        if ($request->hasFile('avatar')) {
            $name_file = Str::random(15).'.jpg';
            $image = $request->file('avatar');
            $image_save = Image::make($image->getRealPath());
            $image_save->resize(128, 128);
            $image_save->save(storage_path(env('LOCAL_PATH_AVATAR') . $name_file));
            auth()->user()->avatar = $name_file;
            auth()->user()->save();
        }

        PartnerWantJobs::whereUserId(auth()->user()->id)->delete();
        PartnerRegions::whereUserId(auth()->user()->id)->delete();

        foreach($request->types_of_jobs as $jobId){
            PartnerWantJobs::create(['user_id'=>auth()->user()->id, 'type_job_id'=>$jobId]);
        }

        foreach($request->region_ids as $regionId){
            PartnerRegions::create(['user_id'=>auth()->user()->id, 'region_id'=>$regionId]);
        }

        return back()->with('success', true);
    }


    /**
     * Display form password.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPasswordForm()
    {
		if(!$this->active()){
			 return view('front.partner.noactive');
		}
        app()->make(SeoMetaTags::class)->setMeta('system.partner.password');
        return view('front.partner.password');
    }

    /**
     * Update password
     * @param  Request $request
     * @return Illuminate\Http\RedirectRespons
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (Hash::check($request->old_password , auth()->user()->password )) {
            auth()->user()->update(['password' => bcrypt($request->password)]);
            return redirect()->back()->with('success', true);
        }
        return back()->withErrors(['old_password'=>__('old_password')]);
    }

    /**
     * abrechnung
     * @param  Request $request
     * @return Illuminate\Http\RedirectRespons
     */
    public function abrechnung(Request $request)
    {
        $year = request()->get('year',null);

        if($year){
            $invoices = auth()->user()->getInvoices()->orderBy('invoice_to_user.id','DESC')->where('invoice_to_user.year',$year)->get();
            return view('front.partner.invoices',compact(['invoices']));
        }

        $invoices = auth()->user()->getInvoices()->orderBy('invoice_to_user.id','DESC')->get();
        return view('front.partner.invoices',compact(['invoices']));
    }
}
