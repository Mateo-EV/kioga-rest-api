<?php

namespace App\Http\Requests;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class BrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $brand = $this->route()->parameter("brand");

        return [
            "name" => ["required", "string", "max:255"],
            "image" => [
                $brand ? "nullable" : "required",
                File::image()
                    ->max(516)
                    ->dimensions(
                        Rule::dimensions()->maxWidth(1024)->maxHeight(1024)
                    )
            ]
        ];
    }
}