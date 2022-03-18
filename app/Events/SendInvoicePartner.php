<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class SendInvoicePartner
{
    use SerializesModels;
    public $email;
    public $filePath;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email, $filePath)
    {
        $this->email = $email;
        $this->filePath = $filePath;
    }

}
