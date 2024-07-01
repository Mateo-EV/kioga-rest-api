<?php

namespace App\Http\Requests;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $product = $this->route()->parameter("product");

        return [
            "name" => ["required", "string", "max:255"],
            "description" => ["required", "string", "max:255"],
            "price" => ["required", "decimal:2"],
            "discount" => ["required", "decimal:2", "min:0", "max:1"],
            "stock" => ["nullable", "integer", "min:0"],
            "category_id" => [
                "required",
                "integer",
                "exists:" . Category::class . ",id"
            ],
            "subcategory_id" => [
                "nullable",
                "integer",
                Rule::exists("subcategories", "id")->where(function (
                    \Illuminate\Database\Query\Builder $query
                ) {
                    return $query->where(
                        "category_id",
                        $this->input("category_id")
                    );
                })
            ],
            "brand_id" => [
                "required",
                "integer",
                "exists:" . Brand::class . ",id"
            ],
            "is_active" => ["required", "boolean"],
            "image" => [
                $product ? "nullable" : "required",
                File::image()
                    ->max(516)
                    ->dimensions(
                        Rule::dimensions()->maxWidth(1024)->maxHeight(1024)
                    )
            ]
        ];
    }
}
