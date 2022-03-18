<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailChangeInfoPartner extends Mailable
{
    use Queueable, SerializesModels;
    public $partner;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($partner)
    {
        $this->partner = $partner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.admin.email_change_partner_info')->subject('Datenänderung');
    }
}
