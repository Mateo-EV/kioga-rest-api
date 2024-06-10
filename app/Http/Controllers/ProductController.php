<?php

namespace App\Http\Controllers;

use App\Helpers\QueryHelper;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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

        $subcategory = $request->query("subcategory", []);
        if ($subcategory) {
            $product
                ->join(
                    "subcategories",
                    "subcategories.id",
                    "=",
                    "products.subcategory_id"
                )
                ->whereIn("subcategories.slug", $subcategory);
        }

        return $this->getPaginatedProductsWithFilters($request, $product);
    }

    public function showForCustomer(string $slug)
    {
        return Product::where("slug", $slug)
            ->select(Product::$fields_for_customers)
            ->with(["brand:id,name,slug", "category:id,name,slug"])
            ->first();
    }

    public function showForCustomerSimilar(string $slug)
    {
        $product = Product::select(Product::$fields_for_customers)
            ->where("slug", $slug)
            ->first();

        return Product::where("products.id", "!=", $product->id)
            ->where(function (Builder $query) use ($product) {
                $query
                    ->where("category_id", $product->category_id)
                    ->orWhere("brand_id", $product->brand_id);
            })
            ->orderByRaw("priority")
            ->limit(10)
            ->withRelations(
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
                customSelect: [
                    DB::raw("CASE
                    WHEN subcategory_id = {$product->subcategory_id} THEN 1
                    WHEN category_id = {$product->category_id} THEN 2
                    WHEN brand_id = {$product->brand_id} THEN 3
                    END AS priority")
                ]
            );
    }

    public function getTop10BestSellerWeeklyProducts()
    {
        $oneWeekAgo = now()->subWeek()->toDateTimeString();

        return Product::leftJoin(
            DB::raw("(SELECT product_id, SUM(quantity) as total
                    FROM order_products
                    JOIN orders ON order_products.order_id = orders.id
                    WHERE orders.status = 'entregado'
                    AND orders.created_at >= '{$oneWeekAgo}'
                    GROUP BY product_id) as sells"),
            "products.id",
            "=",
            "sells.product_id"
        )
            ->orderByRaw("sells.total desc")
            ->limit(10)
            ->withRelations(
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
                select: Product::$fields_for_customers
            );
    }

    public function searchForCustomer(string $search)
    {
        $categoriesSearchResult = Category::select(["id", "name", "image", "slug"])
            ->addSelect(DB::raw("'categories' as type"))
            ->where("name", "LIKE", "%{$search}%")
            ->limit(3);
        $brandsSearchResult = Brand::select(["id", "name", "image", "slug"])
            ->addSelect(DB::raw("'brands' as type"))
            ->where("name", "LIKE", "%{$search}%")
            ->limit(3);

        $productsSearchResult = DB::table("products")
            ->select(["id", "name", "image", "slug"])
            ->addSelect(DB::raw("'products' as type"))
            ->where("name", "LIKE", "%{$search}%")
            ->limit(3)
            ->unionAll($categoriesSearchResult)
            ->unionAll($brandsSearchResult)
            ->get();

        $response = [
            "products" => [],
            "categories" => [],
            "brands" => []
        ];

        foreach ($productsSearchResult as $value) {
            $actual_key = $value->type;
            unset($value->type);
            $value->image =
                config("app.url") . "/storage/{$actual_key}/{$value->image}";
            $response[$actual_key][] = $value;
        }

        return $response;
    }
}