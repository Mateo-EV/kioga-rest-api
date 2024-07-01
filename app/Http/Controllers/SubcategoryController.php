<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryRequest;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SubcategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        return Subcategory::withCount(["products"])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubcategoryRequest $request)
    {
        $subcategory = $request->validated();

        $subcategory["slug"] = Str::slug($subcategory["name"]);

        if (
            Subcategory::where("slug", $subcategory["slug"])
                ->where("category_id", $subcategory["category_id"])
                ->exists()
        ) {
            throw ValidationException::withMessages([
                "slug" => "El slug generado ya existe, eliga otro nombre"
            ]);
        }

        return Subcategory::create($subcategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SubcategoryRequest $request,
        Subcategory $subcategory
    ) {
        $subcategory_updated = $request->validated();
        $subcategory_updated["slug"] = Str::slug($subcategory_updated["name"]);

        if (
            Subcategory::where("slug", $subcategory_updated["slug"])
                ->where("id", $subcategory["id"])
                ->where("category_id", $subcategory["category_id"])
                ->exists()
        ) {
            throw ValidationException::withMessages([
                "slug" => "El slug generado ya existe, eliga otro nombre"
            ]);
        }

        $subcategory->update($subcategory_updated);

        return $subcategory;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        return $subcategory;
    }
}
