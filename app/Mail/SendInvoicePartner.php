<?php

namespace App\Mail;

use App\Models\InvoiceToUser;
use App\Models\UserNotifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvoicePartner extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $invoice;
    public $filePath;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $filePath, $invoice)
    {
        $this->invoice = $invoice;
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
        UserNotifications::create([
            'invoice_id'=>$this->invoice->id,
            'user_id'=>$this->invoice->user_id,
            'status'=> 1,
        ]);

        $this->markdown('emails.partner.send-invoice')
            ->subject('Rechnung Offerten 365')
            ->attach($this->filePath);


    }
}
