<?php

namespace App\Listeners;

use App\Events\ProposalAccepted;

use App\Mail\NotifyEmailClient;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
use Illuminate\Support\Facades\Mail;

class ProposalAcceptedListener
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
     * @param  ProposalAccepted  $event
     * @return void
     */
    public function handle(ProposalAccepted $event)
    {
        $mailable = new NotifyEmailClient($event->proposal);
        Mail::to($event->proposal->getUser->email)->queue($mailable);

        Log::info('Proposal accepted ID: '.$event->proposal->id.' - User ID: '. auth()->user()->id);

    }
}
