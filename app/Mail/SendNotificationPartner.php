<?php

namespace App\Mail;

use App\Models\UserNotifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNotificationPartner extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $invoice;
    public $content;
    public $text;
    public $filePath;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice, $content, $filePath)
    {
        $this->invoice = $invoice;
        $this->user = $invoice->getPartner;
        $this->content = $content;
        $this->filePath = $filePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $findTemplate = ['{name}','{lastname}'];
        $replaceTemplate = [$this->user->name,$this->user->lastname];
        $this->text = str_replace($findTemplate,$replaceTemplate,$this->content['content']);

        UserNotifications::create([
            'invoice_id'=>$this->invoice->id,
            'user_id'=>$this->user->id,
            'status'=> 1,
        ]);

        $this->markdown('emails.partner.send-notification-partner')
            ->subject($this->content['subject'])
            ->attach($this->filePath);
    }
}
