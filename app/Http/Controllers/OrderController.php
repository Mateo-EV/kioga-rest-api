<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use App\Services\MercadoPagoService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        $order = $request->validated();

        if (!isset($order["address_id"])) {
            $address = Address::create(
                $order["address"] + ["user_id" => $order["user_id"]]
            );
            $order["address_id"] = $address->id;
        }

        return Order::create($order);
    }

    public function showForCustomer()
    {
        return Order::where("user_id", auth()->id())
            ->with([
                "details" => [
                    "product:" . implode(",", Product::$fields_for_customers)
                ],
                "address"
            ])
            ->lazy();
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

        $preference = $client->createPaymentPreference(
            $products,
            $payer,
            $data["is_delivery"]
        );

        return response()->json($preference);
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Brand $brand)
    // {
    //     return $brand;
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(BrandRequest $request, Brand $brand)
    // {
    //     $brand_updated = $request->validated();
    //     $brand_updated["slug"] = Str::slug($brand_updated["name"]);

    //     if ($request->hasFile("image")) {
    //         Storage::delete("brands/" . $brand->original_image_url);

    //         $brand_updated["image"] =
    //             $brand["slug"] . $request->file("image")->getType();

    //         $request
    //             ->file("image")
    //             ->storePubliclyAs("brands", $brand_updated["image"]);
    //     }

    //     $brand->update($brand_updated);

    //     return $brand;
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Brand $brand)
    // {
    //     $brand->delete();

    //     Storage::delete("brands/" . $brand->original_image_url);

    //     return $brand;
    // }
}
