<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Log;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\Resources\Preference;

class MercadoPagoService
{
    public function __construct()
    {
        $this->authenticate();
    }

    protected function authenticate()
    {
        MercadoPagoConfig::setAccessToken(config("mercadopago.access_token"));
        MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);
    }

    protected function createPreferenceRequest(
        array $products,
        $payer,
        bool $isDelivery,
        $metadata
    ) {
        $paymentMethods = [
            "excluded_payment_methods" => [],
            "installments" => 12,
            "default_installments" => 1
        ];

        $backUrls = [
            "success" => config("app.frontend_url") . "/pedidos?success=true",
            "failure" => config("app.frontend_url") . "/pedidos?error=true"
        ];

        if ($isDelivery) {
            $products[] = [
                "id" => "delivery_fee",
                "title" => "Delivery Fee",
                "quantity" => 1,
                "unit_price" => 5.0,
                "currency_id" => "PEN"
            ];
        }

        $request = [
            "items" => $products,
            "payer" => $payer,
            "payment_methods" => $paymentMethods,
            "back_urls" => $backUrls,
            "expires" => false,
            "metadata" => $metadata,
            "notification_url" => route("mercado_pago.webhook"),
            "auto_return" => "approved"
        ];

        return $request;
    }

    public function getPaymentDetails($paymentId)
    {
        try {
            $payment = new PaymentClient();
            return $payment->get($paymentId);
        } catch (MPApiException $error) {
            Log::error("MercadoPago API error", [
                "message" => $error->getMessage(),
                "response" => $error->getApiResponse()->getContent()
            ]);
            return null;
        }
    }

    public function createPaymentPreference(
        array $products,
        $payer,
        bool $isDelivery,
        $metadata
    ): ?Preference {
        $request = $this->createPreferenceRequest(
            $products,
            $payer,
            $isDelivery,
            $metadata
        );

        $client = new PreferenceClient();

        try {
            $preference = $client->create($request);

            return $preference;
        } catch (MPApiException $error) {
            Log::error("MercadoPago API error", [
                "message" => $error->getMessage(),
                "response" => $error->getApiResponse()->getContent()
            ]);
            return null;
        }
    }
}
