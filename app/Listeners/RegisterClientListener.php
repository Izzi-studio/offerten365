<?php

namespace App\Listeners;

use App\Events\RegisterClient;
use App\Models\Proposal;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\NewProposal;
use App\Mail\SendEmailClientRegister;
use Log;
use Mail;
class RegisterClientListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegisterClient  $event
     * @return void
     */
    public function handle(RegisterClient $event)
    {
		
		$mailable = new SendEmailClientRegister($event->user, $event->password, $event->subject);

        Mail::to($event->user->email)->queue($mailable);
		
       /* $proposal = $event->request->only('proposal')['proposal'];
        $proposal['user_id'] = $event->user->id;
        $proposal['additional_info'] = $event->request->only('additional_info')['additional_info'];

        event(new NewProposal(Proposal::create($proposal)));
       */
    }
}
