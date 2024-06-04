<?php

namespace App\Http\Controllers;

use App\Helpers\QueryHelper;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected function getPaginatedProductsWithFilters(
        Request $request,
        Builder $product
    ) {
        $product
            ->where("is_active", true)
            ->whereRaw(
                "products.price * (1 - products.discount) between ? and ?",
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
        $raw_query = match ($filter) {
            "name-asc" => "products.name asc",

            "name-desc" => "products.name desc",

            "price-asc" => "price_discounted asc",

            "price" => "price_discounted desc",

            default => "sells.total desc"
        };

        if ($raw_query === "sells.total desc") {
            $product->leftJoin(
                DB::raw("(SELECT product_id, SUM(quantity) as total
                                    FROM order_products
                                    JOIN orders ON order_products.order_id = orders.id
                                    WHERE orders.status = 'entregado'
                                    GROUP BY product_id) as sells"),
                "products.id",
                "=",
                "sells.product_id"
            );
        }

        $product->orderByRaw($raw_query);

        return $product->orderBy("products.id")->cursorPaginationWith(
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
            select: Product::$fields_for_customers,
            perPage: 15
        );
    }

    public function indexForCustomers(Request $request)
    {
        return $this->getPaginatedProductsWithFilters(
            $request,
            Product::query()
        );
    }

    public function indexForCustomersByCategorySlug(
        Request $request,
        string $slug
    ) {
        $product = Product::query();

        $product->where("categories.slug", $slug);

        return $this->getPaginatedProductsWithFilters($request, $product);
    }

    public function showForCustomer(string $slug)
    {
        return Product::where("slug", $slug)
            ->select(Product::$fields_for_customers)
            ->with(["brand:id,name,slug", "category:id,name,slug"])
            ->first();
    }
}