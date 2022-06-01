<?php

namespace App\Events;

use App\Models\InvoiceToUser;
use Illuminate\Queue\SerializesModels;

class SendInvoicePartner
{
    use SerializesModels;
    public $email;
    public $invoice;
    public $filePath;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email, $filePath, $invoice)
    {
        $this->invoice = $invoice;
        $this->email = $email;
        $this->filePath = $filePath;
    }

}
