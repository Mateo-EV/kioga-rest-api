<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexForCustomers()
    {
        return Brand::all(["id", "name", "slug", "image"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $brand = $request->validated();
        $brand["slug"] = Str::slug($brand["name"]);
        $brand["image"] = $brand["slug"] . $request->file("image")->getType();

        $request->file("image")->storePubliclyAs("brands", $brand["image"]);

        return Brand::create($brand);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return $brand;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $brand_updated = $request->validated();
        $brand_updated["slug"] = Str::slug($brand_updated["name"]);

        if ($request->hasFile("image")) {
            Storage::delete("brands/" . $brand->original_image_url);

            $brand_updated["image"] =
                $brand["slug"] . $request->file("image")->getType();

            $request
                ->file("image")
                ->storePubliclyAs("brands", $brand_updated["image"]);
        }

        $brand->update($brand_updated);

        return $brand;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        Storage::delete("brands/" . $brand->original_image_url);

        return $brand;
    }
}
