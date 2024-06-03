<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return Brand::paginate(10);
    // }
    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(BrandRequest $request)
    // {
    //     $brand = $request->validated();
    //     $brand["slug"] = Str::slug($brand["name"]);
    //     $brand["image"] = $brand["slug"] . $request->file("image")->getType();
    //     $request->file("image")->storePubliclyAs("brands", $brand["image"]);
    //     return Brand::create($brand);
    // }
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

    public function showForCustomers(Request $request)
    {
        $product = Product::query();

        $product
            ->where("is_active", true)
            ->whereRaw(
                "CAST(products.price * (1 - products.discount) AS DECIMAL(10,2)) between ? and ?",
                [$request->get("min", 0), $request->get("max", 4000)]
            );

        $categories = $request->query("category", []);
        $brands = $request->query("brand", []);

        if ($categories) {
            $product->whereIn("categories.slug", $categories);
        }

        if ($brands) {
            $product->whereIn("brands.slug", $brands);
        }

        // Filtrar por disponibilidad
        $availabilities = $request->query("availability", []);
        if ($availabilities && count($availabilities) < 2) {
            $product->where(function ($q) use ($availabilities) {
                $q->where(
                    "stock",
                    $availabilities[0] === "stock" ? ">" : "=",
                    0
                );
            });
        }

        $filter = $request->query("orderBy", "best_seller");
        if ($filter === "best_seller") {
            $product
                ->leftJoin(
                    DB::raw("(SELECT product_id, SUM(quantity) as total 
                                      FROM order_products 
                                      JOIN orders ON order_products.order_id = orders.id 
                                      WHERE orders.status = 'entregado' 
                                      GROUP BY product_id) as sells"),
                    "products.id",
                    "=",
                    "sells.product_id"
                )
                ->orderBy("sells.total", "desc");
        } else {
            $filter = match ($filter) {
                "name-asc" => ["name", "asc"],
                "name-desc" => ["name", "desc"],
                "price-asc" => ["price_discounted", "asc"],
                "price" => ["price_discounted", "desc"],
                default => ["name", "asc"]
            };

            $product->orderByRaw($filter[0] . " " . $filter[1]);
        }

        return $product->cursorPaginationWith(
            relations: [
                [
                    "name" => "category",
                    "table" => "categories",
                    "properties" => ["id", "name", "slug"]
                ],
                [
                    "name" => "brand",
                    "table" => "brands",
                    "properties" => ["id", "name", "slug"]
                ]
            ],
            select: [
                "id",
                "name",
                "slug",
                "description",
                "price",
                "discount",
                "image",
                "stock",
                "category_id",
                "subcategory_id",
                "brand_id"
            ],
            perPage: 20
        );
    }
}
