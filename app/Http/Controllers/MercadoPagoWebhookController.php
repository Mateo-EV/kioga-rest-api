<?php

namespace App\Http\Controllers;

use App\Helpers\MercadoPagoWebhook;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Services\MercadoPagoService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isNull;

class MercadoPagoWebhookController extends Controller
{
    public function __construct(private MercadoPagoService $mercado_pago)
    {
    }

    public static function middleware(): array
    {
        return [
            function (Request $request, Closure $next) {
                $signature = $request->header("x-signature");
                $payload = $request->getContent();
                if (
                    static::isValidSignature(
                        $signature,
                        $payload,
                        config("mercadopago.webhook_token")
                    ) &&
                    $request->input("type") === "payment"
                ) {
                    return $next($request);
                }
            }
        ];
    }

    public function handle(Request $request)
    {
        $mercado_pago_webhook = new MercadoPagoWebhook($request);

        if ($mercado_pago_webhook->action !== "payment.created") {
            return response()->noContent(status: 400);
        }
        Log::info($request->all());

        $payment = $this->mercado_pago->getPaymentDetails(
            $mercado_pago_webhook->data_id
        );

        if (is_null($payment)) {
            return response()->noContent(status: 400);
        }

        $this->createOrder($payment);

        return response()->json(["success" => true]);
    }

    protected static function isValidSignature($signature, $payload, $secret)
    {
        $expectedSignature = hash_hmac("sha256", $payload, $secret);
        return hash_equals($expectedSignature, $signature);
    }

    protected function createOrder($payment)
    {
        $order = (array) $payment->metadata;
        $order["payment_id"] = $payment->id;
        if (isset($order["address"])) {
            $order["address_id"] = Address::create(
                array_merge($order["address"], ["user_id" => $order["user_id"]])
            )->id;
            unset($order["address"]);
        }

        /** @var Order*/
        $order_created = Order::create($order);

        $order_created->details()->createMany($order["details"]);
    }
}
