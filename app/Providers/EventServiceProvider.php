<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class
        ],
        'App\Events\RegisterClient' => [
            'App\Listeners\RegisterClientListener',
        ],
        'App\Events\RegisterPartner' => [
            'App\Listeners\RegisterPartnerListener',
        ],
        'App\Events\NewProposal' => [
            'App\Listeners\NewProposalListener',
        ],
        'App\Events\NotifyPartner' => [
            'App\Listeners\SendNotifyEmailPartner',
        ],
        'App\Events\ProposalAccepted' => [
            'App\Listeners\ProposalAcceptedListener',
        ],
        'App\Events\ProposalDelete' => [
            'App\Listeners\ProposalDeleteListener',
        ],
        'App\Events\SendInvoicePartner' => [
            'App\Listeners\SendInvoicePartnerListener',
        ],
        'App\Events\EmailChangeInfoPartner' => [
            'App\Listeners\EmailChangeInfoPartnerListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
