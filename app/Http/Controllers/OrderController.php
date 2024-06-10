<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isEmpty;

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

        if (isEmpty($order["address_id"])) {
            $address = Address::create(
                $order["address"] + ["user_id" => $order["user_id"]]
            );
            $order["address_id"] = $address->id;
        }

        return Order::create($order);
    }

    public function showForCustomer()
    {
        return Order::where("user_id", auth()->id())->with("details")->get();
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
