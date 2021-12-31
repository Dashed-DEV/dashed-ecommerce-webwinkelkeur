<?php

namespace Qubiqx\QcommerceEcommerceWebwinkelkeur\Classes;

use Qubiqx\QcommerceCore\Classes\Sites;
use Qubiqx\QcommerceCore\Models\Customsetting;
use Qubiqx\QcommerceEcommerceCore\Models\Order;
use WebwinkelKeur\Client;
use WebwinkelKeur\Client\Request;

class Webwinkelkeur
{
    public static function initialize($siteId = null)
    {
        if (!$siteId) {
            $siteId = Sites::getActive();
        }

        $clientId = Customsetting::get('webwinkelkeur_client_id', $siteId);
        $authToken = Customsetting::get('webwinkelkeur_auth_token', $siteId);

        if (!$clientId && !$authToken) {
            return;
        }

        $webwinkelKeurClient = new Client($clientId, $authToken);
        return $webwinkelKeurClient;
    }

    public static function isConnected($siteId = null)
    {
        if (!$siteId) {
            $siteId = Sites::getActive();
        }

        $webwinkelKeurClient = self::initialize($siteId);

        if (!$webwinkelKeurClient) {
            return false;
        }

        try {
            $webshop = $webwinkelKeurClient->getWebshop();
            Customsetting::set('webwinkelkeur_connection_error', null, $siteId);
            return true;
        } catch (Client\Exception $e) {
            Customsetting::set('webwinkelkeur_connection_error', $e->getMessage(), $siteId);
            Customsetting::set('webwinkelkeur_connected', false, $siteId);
            return false;
        }
    }

    public static function sendReviewEmail(Order $order)
    {
        if (self::isConnected()) {
            $webwinkelKeurClient = self::initialize();
            $invitation = new Request\Invitation();
            $invitation
                ->setCustomerName($order->name)
                ->setEmailAddress($order->email)
                ->setOrderNumber($order->invoice_id)
                ->setOrderTotal($order->total);

            if ($order->phone_number) {
                $invitation->setPhoneNumbers([$order->phone_number]);
            }

            try {
                $webwinkelKeurClient->sendInvitation($invitation);
                echo 'Success!';
            } catch (Client\Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}