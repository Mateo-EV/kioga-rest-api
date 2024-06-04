<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
        $category->brands = $brands;

        return $category;
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
