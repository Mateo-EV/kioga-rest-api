<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use MercadoPago\Client\Payment\PaymentClient;

class MercadoPagoWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $data = $request->all();

        Log::info("MercadoPago Webhook received", $data);

        if (isset($data["type"]) && $data["type"] == "payment") {
            $paymentId = $data["data"]["id"];

            $payment = $this->getPaymentDetails($paymentId);

            if ($payment->status == "approved") {
                $this->createOrder($payment);
            }
        }

        return response()->json(["status" => "success"]);
    }

    protected function getPaymentDetails($paymentId)
    {
        // Implementa la lógica para obtener los detalles del pago desde la API de MercadoPago
        // Usa la biblioteca de MercadoPago para obtener los detalles del pago
        $payment = new PaymentClient();
        return $payment->get($paymentId);
    }

    protected function createOrder($payment)
    {
        // Obtén los datos del pedido del pago
        $items = $payment->items;
        $payer = $payment->payer;

        // Crea el pedido
        $order = new Order();
        $order->user_id = auth()->id(); // o el ID del usuario de alguna manera
        $order->total = $payment->transaction_amount;
        $order->status = "Pendiente";
        $order->save();

        // Crea los detalles del pedido
        foreach ($items as $item) {
            $orderDetail = new OrderProduct();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $item->id;
            $orderDetail->quantity = $item->quantity;
            $orderDetail->price = $item->unit_price;
            $orderDetail->save();
        }
    }
}
