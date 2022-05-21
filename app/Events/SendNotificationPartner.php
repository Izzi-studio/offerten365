<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class SendNotificationPartner
{
    use SerializesModels;
    public $invoice;
    public $content;
    public $filePath;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($invoice, $content, $filePath)
    {
        $this->invoice = $invoice;
        $this->content = $content;
        $this->filePath = $filePath;
    }

}
