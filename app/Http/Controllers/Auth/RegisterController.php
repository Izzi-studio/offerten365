<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\NotifyEmailPartnerWaitActivate;
use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Traits\Registers;
use App\Traits\RegisterClientTrait;
use App\Traits\RegisterPartnerTrait;
use App\Traits\ProposalsFormTrait;
use App\Traits\CheckFieldTrait;
use App\Events\RegisterClient;
use App\Events\RegisterPartner;
use App\Events\NewProposal;
use Log;
use Auth;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use Registers;
    use RegisterClientTrait;
    use RegisterPartnerTrait;
    use ProposalsFormTrait;
    use CheckFieldTrait;

    private $password = '';
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {

        if ($user->isPartner() ) {
            event(new RegisterPartner($user,$this->password));

            $mailable = new NotifyEmailPartnerWaitActivate();
            Mail::to($user->email)->queue($mailable);

            Log::info('Registered Partner Login: '.$user->email.' PWD: '.$this->password);
            Log::info('----DONE----');
            Log::info('');

            return  response()->json(['url'=>route('partner.myInfo')], 200);

        }

        if ($user->isClient() ) {
            Log::info('Registered Client Login: '.$user->email.' PWD: '.$this->password);


            $proposal = $request->only('proposal')['proposal'];
            $proposal['user_id'] = $user->id;
            $proposal['additional_info'] = $request->only('additional_info')['additional_info'];

            event(new NewProposal(Proposal::create($proposal)));
            Log::info('----DONE----');
            Log::info('');

			/*$arraySubjects = [
				'1'=>'Umzugsanfrage',
				'2'=>'Reinigungsanfrage',
				'3'=>'Umzugs - und Reinigungsanfrage',
				'4'=>'Maleranfrage'
			]; */


			//$subject = $arraySubjects[$proposal['type_job_id']];
			//$subject = 'Vielen Dank für Ihre Anfrage';

			event(new RegisterClient($user,$this->password));

            return  response()->json(['url'=>route('client.success.register')], 200);

        }
    }

}
