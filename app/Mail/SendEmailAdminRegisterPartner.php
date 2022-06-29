<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Log;
class SendEmailAdminRegisterPartner extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $password;
	public $filePath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password, $filePath = false)
    {
        $this->user = $user;
        $this->password = $password;
        $this->filePath = $filePath;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		if($this->filePath){
			return $this->markdown('emails.admin.notify_register_partner')->attach($this->filePath)->subject('Neue Firmen Registration');
		}
		return $this->markdown('emails.admin.notify_register_partner')->subject('Neue Firmen Registration');
    }
}
