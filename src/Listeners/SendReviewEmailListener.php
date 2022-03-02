<?php

namespace Qubiqx\QcommerceEcommerceWebwinkelkeur\Listeners;

use Qubiqx\QcommerceEcommerceWebwinkelkeur\Classes\Webwinkelkeur;
use Qubiqx\QcommerceEcommerceCore\Events\Orders\OrderMarkedAsPaidEvent;

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
