<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

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
            "categories.image",
            DB::raw(
                "COALESCE(SUM(order_products.total_quantity), 0) as total_quantity"
            )
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
            ->orderByRaw("total_quantity desc")
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
    public function index()
    {
        return Category::withCount(["products"])
            ->with(["subcategories"])
            ->orderBy("id", "desc")
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = $request->validated();

        $category["slug"] = Str::slug($category["name"]);

        if (Category::where("slug", $category["slug"])->exists()) {
            throw ValidationException::withMessages([
                "slug" => "El slug generado ya existe, eliga otro nombre"
            ]);
        }

        $category["image"] =
            $category["slug"] .
            "." .
            $request->file("image")->getClientOriginalExtension();

        $request
            ->file("image")
            ->storePubliclyAs("categories", $category["image"]);

        return Category::create($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditCategoryRequest $request, Category $category)
    {
        $category_updated = $request->validated();
        $category_updated["slug"] = Str::slug($category_updated["name"]);

        if (
            Category::where("slug", $category_updated["slug"])
                ->where("id", "!=", $category->id)
                ->exists()
        ) {
            throw ValidationException::withMessages([
                "slug" => "El slug generado ya existe, eliga otro nombre"
            ]);
        }

        if ($request->hasFile("image")) {
            Storage::delete("categories/" . $category->original_image_url);

            $category_updated["image"] =
                $category_updated["slug"] .
                "." .
                $request->file("image")->getClientOriginalExtension();

            $request
                ->file("image")
                ->storePubliclyAs("categories", $category_updated["image"]);
        }

        $category->update($category_updated);

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        Storage::delete("categories/" . $category->original_image_url);

        return $category;
    }
}
