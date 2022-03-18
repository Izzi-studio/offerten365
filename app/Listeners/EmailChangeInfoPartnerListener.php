<?php

namespace App\Listeners;

use App\Events\EmailChangeInfoPartner;
use App\Events\NotifyPartner;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
use App\Models\ProposalToPartner;
use Carbon\Carbon;
use App\Mail\SendEmailChangeInfoPartner;
use Illuminate\Support\Facades\Mail;

class EmailChangeInfoPartnerListener
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
     * @param  NewProposal  $event
     * @return void
     */
    public function handle(EmailChangeInfoPartner $event)
    {
        $mailable = new SendEmailChangeInfoPartner($event->partner);
        Mail::to(env('MAIL_USERNAME'))->queue($mailable);

    }


}
