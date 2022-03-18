<?php

namespace App\Listeners;

use App\Events\ProposalDelete;
use Proposal;
use App\Mail\NotifyDeleteProposal;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
use Illuminate\Support\Facades\Mail;

class ProposalDeleteListener
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
     * @param  ProposalDelete  $event
     * @return void
     */
    public function handle(ProposalDelete $event)
    {

        foreach($event->proposal->getResponded()->withTrashed()->get() as $responded){
            $mailable = new NotifyDeleteProposal($event->proposal, $responded->getPartner->name);
            Mail::to($responded->getPartner->email)->queue($mailable);
			Log::info('Notify partner about delete proposal ID: '.$event->proposal->id.' - User: '. $responded->getPartner->email);
        }

    }
}
