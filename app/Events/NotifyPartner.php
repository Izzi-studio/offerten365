<?php

namespace App\Events;


use Illuminate\Queue\SerializesModels;

class NotifyPartner
{
    use SerializesModels;
    public $recipients;
    public $proposal;
    public $flagFullInfo;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $recipients, $proposal,$flagFull = false)
    {
       $this->recipients = $recipients;
       $this->proposal = $proposal;
       $this->flagFullInfo = $flagFull;
    }

}
