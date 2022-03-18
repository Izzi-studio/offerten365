<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Proposal;

class NotifyEmailClient extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Proposal $proposal)
    {
        $this->name = $proposal->getUser->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails.client.notification_accepted_proposal')->subject('Ihre Anfrage wurde bestätigt');
    }
}
