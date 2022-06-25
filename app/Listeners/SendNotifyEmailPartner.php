<?php

namespace App\Listeners;

use App\Events\NotifyPartner;
use Log;
use App\Mail\NotifyEmailPartner;
use Illuminate\Support\Facades\Mail;


class SendNotifyEmailPartner
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
     * @param  NotifyPartner  $event
     * @return void
     */
    public function handle(NotifyPartner $event)
    {
        foreach($event->recipients as $recipient){
            $mailable = new NotifyEmailPartner($recipient['name'],$event->proposal,$event->flagFullInfo);
            Mail::to($recipient['email'])->queue($mailable);
            Log::info('Send email notify partner to: '.$recipient['email'].' : '.$recipient['name']. 'Full Info : ' .$event->flagFullInfo == true ? 'true' : 'false');
        }
        Log::info('----DONE----');

    }
}
