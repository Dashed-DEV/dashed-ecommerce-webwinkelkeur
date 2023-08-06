<?php

namespace Dashed\DashedEcommerceWebwinkelkeur;

use Dashed\DashedEcommerceCore\Events\Orders\OrderMarkedAsPaidEvent;
use Dashed\DashedEcommerceWebwinkelkeur\Listeners\SendReviewEmailListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class DashedEcommerceWebwinkelkeurEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        OrderMarkedAsPaidEvent::class => [
            SendReviewEmailListener::class,
        ],
    ];
}
