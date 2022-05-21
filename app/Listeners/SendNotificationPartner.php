<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNotificationPartner as SendNotification;

class SendNotificationPartner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $mailable = new SendNotification($event->invoice, $event->content, $event->filePath);
        Mail::to($event->invoice->getPartner->email)->queue($mailable);
    }
}
