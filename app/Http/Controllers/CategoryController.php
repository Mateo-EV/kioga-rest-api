<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function indexForCustomers()
    {
        return Category::all(["id", "name", "image", "slug"]);
    }

    public function showForCustomersBySlug(string $slug)
    {
        $category = Category::where("categories.slug", $slug)
            ->leftJoin("products", "products.category_id", "=", "categories.id")
            ->leftJoin("brands", "brands.id", "=", "products.brand_id")
            ->distinct()
            ->get([
                "categories.id",
                "categories.name",
                "categories.image",
                "categories.slug",
                "brands.id as brand_id",
                "brands.name as brand_name",
                "brands.slug as brand_slug"
            ]);

        $brands = $category->map(function ($item) {
            return [
                "id" => $item->brand_id,
                "name" => $item->brand_name,
                "slug" => $item->brand_slug
            ];
        });

        $category = $category->first();
        unset($category->brand_id);
        unset($category->brand_name);
        unset($category->brand_slug);

        if (!empty($brands) && isset($brands[0])) {
            $category->brands = $brands[0]["id"] == null ? [] : $brands;
        } else {
            $category->brands = [];
        }

        $category->subcategories;

        return $category;
    }

    public function getTopCategories()
    {
        $sells_query = DB::table("order_products")
            ->join("orders", "orders.id", "=", "order_products.order_id")
            ->where("orders.status", "entregado")
            ->selectRaw("product_id, SUM(quantity) as total_quantity")
            ->groupBy("product_id");

        $categories = Category::select(
            "categories.id",
            "categories.name",
            "categories.slug",
            "categories.image"
        )
            ->join("products", "products.category_id", "=", "categories.id")
            ->leftJoinSub($sells_query, "order_products", function (
                JoinClause $leftjoin
            ) {
                $leftjoin->on("products.id", "=", "order_products.product_id");
            })
            ->groupBy(
                "categories.id",
                "categories.name",
                "categories.slug",
                "categories.image"
            )
            ->orderBy("total_quantity", "desc")
            ->take(3)
            ->get();

        $categoriesWithProducts = $categories->map(function ($category) use (
            $sells_query
        ) {
            $category->products = Product::where(
                "products.category_id",
                "=",
                $category->id
            )
                ->leftJoinSub($sells_query, "order_products", function (
                    JoinClause $leftjoin
                ) {
                    $leftjoin->on(
                        "products.id",
                        "=",
                        "order_products.product_id"
                    );
                })
                ->orderBy("total_quantity", "desc")
                ->take(10)
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

            return $category;
        });

        return $categoriesWithProducts;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
