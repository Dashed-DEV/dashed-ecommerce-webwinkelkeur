<?php

namespace Dashed\DashedEcommerceWebwinkelkeur;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Dashed\DashedEcommerceCore\Events\Orders\OrderMarkedAsPaidEvent;
use Dashed\DashedEcommerceWebwinkelkeur\Listeners\SendReviewEmailListener;

class DashedEcommerceWebwinkelkeurEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        OrderMarkedAsPaidEvent::class => [
            SendReviewEmailListener::class,
        ],
    ];
}
