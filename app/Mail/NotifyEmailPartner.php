<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Log;

class NotifyEmailPartner extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $proposal;
    public $type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $proposal)
    {
        $this->name = $name;
        $this->proposal = $proposal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		$arraySubjects = [
				'1'=>'Neue Umzugsanfrage',
				'2'=>'Neue Reinigungsanfrage',
				'3'=>'Neue Umzugs - und Reinigungsanfrage',
				'4'=>'Neue Maleranfrage'
		];
		
		$this->type = $arraySubjects[$this->proposal->type_job_id];
		 
		 
        return $this->markdown('emails.partner.notification_new_proposal')->subject('Neue Anfrage');
    }
}
