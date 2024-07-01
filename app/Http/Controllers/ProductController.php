<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

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
        $categoriesSearchResult = Category::select([
            "id",
            "name",
            "image",
            "slug"
        ])
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::addSelect(["*"])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = $request->validated();
        $product["slug"] = Str::slug($product["name"]);

        if (Product::where("slug", $product["slug"])->exists()) {
            throw ValidationException::withMessages([
                "slug" => "El slug generado ya existe, eliga otro nombre"
            ]);
        }

        $product["image"] =
            $product["slug"] .
            "." .
            $request->file("image")->getClientOriginalExtension();

        $request->file("image")->storePubliclyAs("products", $product["image"]);

        return Product::create($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product_updated = $request->validated();
        $product_updated["slug"] = Str::slug($product_updated["name"]);

        if (
            Product::where("slug", $product_updated["slug"])
                ->where("id", "!=", $product->id)
                ->exists()
        ) {
            throw ValidationException::withMessages([
                "slug" => "El slug generado ya existe, eliga otro nombre"
            ]);
        }

        if ($request->hasFile("image")) {
            Storage::delete("products/" . $product->original_image_url);

            $product_updated["image"] =
                $product_updated["slug"] .
                "." .
                $request->file("image")->getClientOriginalExtension();

            $request
                ->file("image")
                ->storePubliclyAs("products", $product_updated["image"]);
        }

        $product->update($product_updated);

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Storage::delete("products/" . $product->original_image_url);

        return $product;
    }
}
