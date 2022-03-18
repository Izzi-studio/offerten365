<?php
namespace App\Traits;

use App\Models\Proposal;
use App\Models\ProposalToPartner;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PartnerRegions;
use App\Models\PartnerWantJobs;
use Log;
use Str;
use Carbon\Carbon;
trait RegisterPartnerTrait {
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorPartner(array $data)
    {
        Log::info('validator partner');
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'regions_ids' => ['required'],
            'types_of_jobs' => ['required'],
            'postcode' => ['required'],
            'city' => ['required'],
            'street' => ['required'],
            'house' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }




    /**
     * Create a new Partner instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createPartner($request)
    { 

		$data = $request->all();

		$data['types_of_jobs'] = json_decode($data['types_of_jobs']);
		$data['regions_ids'] = json_decode($data['regions_ids']);

        Log::info('create partner');
        $this->password = $data['password'];
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'lastname' => $data['lastname'],
            'company' => $data['company'],
            'role_id' => env('ROLE_ID_PARTNER'),
            'phone' => $data['phone'],
            'postcode' => $data['postcode'],
            'city' => $data['city'],
            'street' => $data['street'],
            'house' => $data['house'],
            'password' => Hash::make($data['password']),
            'profile_slug' => Str::ascii(Str::slug($data['company'])),
        ]);
		
		
		if ($request->hasFile('upload_file')) {
		
			$file = $request->file('upload_file');
			
			$extension =  strtolower($file->getClientOriginalExtension());

			$full_name = $file->getClientOriginalName();
			
			
			$file->move(storage_path(env('LOCAL_PATH_PARNTERFILE').$user->id), $full_name);
        }
 
        foreach($data['types_of_jobs'] as $jobId){
            PartnerWantJobs::create(['user_id'=>$user->id, 'type_job_id'=>$jobId]);
        }

        foreach($data['regions_ids'] as $regionId){
            PartnerRegions::create(['user_id'=>$user->id, 'region_id'=>$regionId]);
        }
        if(Setting::getByKey('system.setting.autosearch_proposal') == 1) {
			$startDate = Carbon::now()->addDays(1)->format('Y/m/d');
            $proposals = Proposal::whereIn('region_id', $data['regions_ids'])
				->where('date_start','>=',$startDate)
                ->whereIn('type_job_id', $data['types_of_jobs'])
                ->inRandomOrder()
                ->limit(Setting::getByKey('system.setting.limit_proposal_to_partner_after_register'))
                ->pluck('id');

            foreach ($proposals as $proposal_id) {
                ProposalToPartner::insert([
                    'proposal_id' => $proposal_id,
                    'user_id' => $user->id
                ]);
            }
            Log::info('Searched for condition...IDS: ' . json_encode($proposals));
        }

        return $user;
    }



    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function registerPartner(Request $request)
    {

        $this->validatorPartner($request->all())->validate();

        event(new Registered($user = $this->createPartner($request)));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

    }
}
