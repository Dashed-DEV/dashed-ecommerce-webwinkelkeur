<?php

namespace Qubiqx\QcommerceEcommerceWebwinkelkeur;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Qubiqx\QcommerceEcommerceCore\Events\Orders\OrderIsPushableForReviewEvent;
use Qubiqx\QcommerceEcommerceWebwinkelkeur\Listeners\SendReviewEmailListener;

class QcommerceEcommerceWebwinkelkeurEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        OrderIsPushableForReviewEvent::class => [
            SendReviewEmailListener::class,
        ],
    ];
}
