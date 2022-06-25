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
    public $flagFullInfo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $proposal, $flagFullInfo)
    {
        $this->name = $name;
        $this->proposal = $proposal;
        $this->flagFullInfo = $flagFullInfo;
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

		if($this->flagFullInfo == 1){
            return $this->markdown('emails.partner.notification_new_proposal_autosubmit')->subject('Neue Anfrage');
        }
        return $this->markdown('emails.partner.notification_new_proposal')->subject('Neue Anfrage');
    }
}
