<?php

namespace Qubiqx\QcommerceEcommerceWebwinkelkeur\Listeners;

use Qubiqx\QcommerceEcommerceCore\Events\Orders\OrderIsPushableForReviewEvent;

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
     * @param  object  $event
     * @return void
     */
    public function handle(OrderIsPushableForReviewEvent $event)
    {
        dump($event);
        $event->order->ip = '123.1.2.3';
        $event->order->save();
    }
}
