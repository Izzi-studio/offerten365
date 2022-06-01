<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Log;
class SendMailingPartner extends Mailable
{
    use Queueable, SerializesModels;
    public $partner;
    public $content;
    public $text;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$partner)
    {
        $this->partner = $partner;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $findTemplate = ['{name}','{lastname}'];
        $replaceTemplate = [$this->partner->name,$this->partner->lastname];
        $this->text = str_replace($findTemplate,$replaceTemplate,$this->content['content']);
        Log::info('Listing Email: '.$this->partner->email);
        $this->markdown('emails.partner.send-mailing')
            ->subject($this->content['subject']);
    }
}
