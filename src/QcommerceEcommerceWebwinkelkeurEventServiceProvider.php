<?php

namespace Qubiqx\QcommerceEcommerceWebwinkelkeur;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Qubiqx\QcommerceEcommerceCore\Events\Orders\OrderMarkedAsPaidEvent;
use Qubiqx\QcommerceEcommerceWebwinkelkeur\Listeners\SendReviewEmailListener;

class QcommerceEcommerceWebwinkelkeurEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        OrderMarkedAsPaidEvent::class => [
            SendReviewEmailListener::class,
        ],
    ];
}
