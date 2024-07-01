<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class BrandController extends Controller
{
    public function indexForCustomers()
    {
        return Brand::all(["id", "name", "slug", "image"]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Brand::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $brand = $request->validated();
        $brand["slug"] = Str::slug($brand["name"]);

        if (Brand::where("slug", $brand["slug"])->exists()) {
            throw ValidationException::withMessages([
                "slug" => "El slug generado ya existe, eliga otro nombre"
            ]);
        }

        $brand["image"] =
            $brand["slug"] .
            "." .
            $request->file("image")->getClientOriginalExtension();

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

        if (
            Brand::where("slug", $brand_updated["slug"])
                ->where("id", "!=", $brand->id)
                ->exists()
        ) {
            throw ValidationException::withMessages([
                "slug" => "El slug generado ya existe, eliga otro nombre"
            ]);
        }

        if ($request->hasFile("image")) {
            Storage::delete("brands/" . $brand->original_image_url);

            $brand_updated["image"] =
                $brand_updated["slug"] .
                "." .
                $request->file("image")->getClientOriginalExtension();

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
