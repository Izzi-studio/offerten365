<?php

namespace App\Mail;

use App\Models\Proposal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Log;

class NotifyDeleteProposal extends Mailable
{
    use Queueable, SerializesModels;
    public $proposal;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Proposal $proposal, $recipientName)
    {
        $this->proposal = $proposal;
        $this->name = $recipientName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->markdown('emails.partner.delete_proposal')->subject('Anfrage wurde gelöscht');
    }

}
