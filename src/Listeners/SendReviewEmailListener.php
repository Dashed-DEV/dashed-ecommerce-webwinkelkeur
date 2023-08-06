<?php

namespace Dashed\DashedEcommerceWebwinkelkeur\Listeners;

use Dashed\DashedEcommerceCore\Events\Orders\OrderMarkedAsPaidEvent;
use Dashed\DashedEcommerceWebwinkelkeur\Classes\Webwinkelkeur;

class SendReviewEmailListener
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
     * @param object $event
     * @return void
     */
    public function handle(OrderMarkedAsPaidEvent $event)
    {
        Webwinkelkeur::sendReviewEmail($event->order);
    }
}
