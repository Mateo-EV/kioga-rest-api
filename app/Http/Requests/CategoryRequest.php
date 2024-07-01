<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class CategoryRequest extends FormRequest
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
        $category = $this->route()->parameter("category");

        return [
            "name" => ["required", "string", "max:255"],
            "image" => [
                $category ? "nullable" : "required",
                File::image()
                    ->max(516)
                    ->dimensions(
                        Rule::dimensions()->maxWidth(1024)->maxHeight(1024)
                    )
            ]
        ];
    }
}
