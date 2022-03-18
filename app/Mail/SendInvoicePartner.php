<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvoicePartner extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $filePath;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $filePath)
    {
        $this->email = $email;
        $this->filePath = $filePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->markdown('emails.partner.send-invoice')
            ->subject('Monatsrechnung')
            ->attach($this->filePath);
    }
}
