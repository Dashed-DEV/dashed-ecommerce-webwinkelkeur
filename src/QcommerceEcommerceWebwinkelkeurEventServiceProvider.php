<?php

namespace Qubiqx\QcommerceEcommerceWebwinkelkeur;

use Qubiqx\QcommerceEcommerceCore\Events\Orders\OrderMarkedAsPaidEvent;
use Qubiqx\QcommerceEcommerceWebwinkelkeur\Listeners\SendReviewEmailListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class QcommerceEcommerceWebwinkelkeurEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        OrderMarkedAsPaidEvent::class => [
            SendReviewEmailListener::class,
        ],
    ];
}
