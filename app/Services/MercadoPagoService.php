<?php

namespace App\Services;

use App\Models\Order;
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
        MercadoPagoConfig::setAccessToken(config("mercadopago.token"));
        MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);
    }

    public function createPreferenceRequest(array $products, $payer)
    {
        $paymentMethods = [
            "excluded_payment_methods" => [],
            "installments" => 12,
            "default_installments" => 1
        ];

        $backUrls = [
            "success" => route("mercadopago.success"),
            "failure" => route("mercadopago.failed")
        ];

        $request = [
            "items" => $products,
            "payer" => $payer,
            "payment_methods" => $paymentMethods,
            "back_urls" => $backUrls,
            "statement_descriptor" => "NAME_DISPLAYED_IN_USER_BILLING",
            "external_reference" => "1234567890",
            "expires" => false,
            "auto_return" => "approved"
        ];

        return $request;
    }

    public function createPaymentPreference(Order $order): ?Preference
    {
        // Fill the data about the product(s) being pruchased
        $product1 = [
            "id" => "1234567890",
            "title" => "Product 1 Title",
            "description" => "Product 1 Description",
            "currency_id" => "BRL",
            "quantity" => 12,
            "unit_price" => 9.9
        ];

        $product2 = [
            "id" => "9012345678",
            "title" => "Product 2 Title",
            "description" => "Product 2 Description",
            "currency_id" => "BRL",
            "quantity" => 5,
            "unit_price" => 19.9
        ];

        // Mount the array of products that will integrate the purchase amount
        $items = [$product1, $product2];

        // Retrieve information about the user (use your own function)
        // $user = getSessionUser();

        // $payer = [
        //     "name" => $user->name,
        //     "surname" => $user->surname,
        //     "email" => $user->email,
        // ];

        // $request = createPreferenceRequest($item, $payer);

        $client = new PreferenceClient();

        try {
            // $preference = $client->create($request);

            // return $preference;
        } catch (MPApiException $error) {
            return null;
        }
    }
}
