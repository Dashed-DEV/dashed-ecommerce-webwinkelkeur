<?php

namespace Qubiqx\QcommerceEcommerceWebwinkelkeur\Listeners;

use Qubiqx\QcommerceEcommerceCore\Events\Orders\OrderIsPushableForReviewEvent;
use Qubiqx\QcommerceEcommerceWebwinkelkeur\Classes\Webwinkelkeur;

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
    public function handle(OrderIsPushableForReviewEvent $event)
    {
        Webwinkelkeur::sendReviewEmail($event->order);
    }
}
