<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use App\Services\MercadoPagoService;

class OrderController extends Controller
{
    public function showForCustomer()
    {
        return Order::where("user_id", auth()->id())
            ->with([
                "details" => [
                    "product:" . implode(",", Product::$fields_for_customers)
                ],
                "address"
            ])
            ->orderBy("id", "desc")
            ->get();
    }

    public function storeForCustomer(MakeOrderRequest $request)
    {
        $client = new MercadoPagoService();
        $data = $request->validated();

        $ids = array_map(
            fn($detail) => $detail["product_id"],
            $data["details"]
        );
        $products = Product::select(Product::$fields_for_customers)
            ->whereIn("id", $ids)
            ->get();

        $products = $products
            ->map(
                fn(Product $product, int $key) => [
                    "id" => $product->id,
                    "title" => $product->name,
                    "description" => $product->description,
                    "quantity" => $data["details"][$key]["quantity"],
                    "unit_price" => doubleval($product->price_discounted),
                    "picture_url" => $product->image,
                    "currency_id" => "PEN"
                ]
            )
            ->toArray();

        $address = isset($data["address_id"])
            ? Address::where("id", $data["address_id"])->first()
            : $data["address"];

        $payer = [
            "name" => $address["first_name"],
            "surname" => $address["last_name"],
            "email" => $request->user()->email
        ];

        $amount = 0;
        $details = [];

        foreach ($products as $product) {
            $amount += $product["quantity"] * $product["unit_price"];
            $details[] = [
                "product_id" => $product["id"],
                "quantity" => $product["quantity"],
                "unit_amount" => $product["unit_price"]
            ];
        }

        $order = [
            "user_id" => auth()->id(),
            "amount" => $amount,
            "shipping_amount" => $data["is_delivery"] ? 5 : 0,
            "status" => "Pendiente",
            "details" => $details
        ];

        $order = array_merge($data, $order);

        $preference = $client->createPaymentPreference(
            $products,
            $payer,
            $data["is_delivery"],
            $order
        );

        return response()->json($preference);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::orderBy("created_at", "desc")->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        $order = $request->validated();
        $order["shipping_amount"] = $order["is_delivery"] ? 5 : 0;

        if (!isset($order["address_id"])) {
            $address = Address::create(
                array_merge($order["address"], ["user_id" => $order["user_id"]])
            );
            $order["address_id"] = $address->id;
        }

        $ids = array_column($order["details"], "product_id");
        $products = Product::whereIn("id", $ids)->get();

        $amount = 0;
        $details = [];
        foreach ($order["details"] as $key => $detail) {
            $amount += $detail["quantity"] * $products[$key]->price_discounted;
            $details[] = array_merge($detail, [
                "unit_amount" => $products[$key]->price_discounted
            ]);
        }

        $order["amount"] = $amount;
        $order = Order::create($order);

        $order->details()->createMany($details);

        return $order->load([
            "details" => ["product:*"],
            "address"
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return $order->load([
            "details" => ["product:*"],
            "address"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order)
    {
        $order_updated = $request->validated();
        $order_updated["shipping_amount"] = $order_updated["is_delivery"]
            ? 5
            : 0;

        $order->update($order_updated);

        $order->details()->delete();

        $ids = array_column($order_updated["details"], "product_id");
        $products = Product::whereIn("id", $ids)->get();

        $amount = 0;
        $details = [];
        foreach ($order_updated["details"] as $key => $detail) {
            $amount += $detail["quantity"] * $products[$key]->price_discounted;
            $details[] = array_merge($detail, [
                "unit_amount" => $products[$key]->price_discounted
            ]);
        }

        $order->details()->createMany($details);

        return $order->load([
            "details" => ["product:*"],
            "address"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return $order;
    }
}
