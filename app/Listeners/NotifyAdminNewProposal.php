<?php

namespace App\Listeners;

use App\Mail\SendEmailAdminNewProposal;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;


class NotifyAdminNewProposal
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $mailable = new SendEmailAdminNewProposal($event->proposal);
        Mail::to(env('MAIL_FROM_ADDRESS'))->queue($mailable);
    }
}
