<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        $order = $this->route()->parameter("order");

        return [
            "user_id" => ["required", "integer", "exists:users,id"],
            "status" => ["required", "string", Rule::in(Order::$status_enum)],
            "is_delivery" => ["required", "boolean"],
            "address_id" => [
                $order ? "required" : "nullable",
                "integer",
                Rule::exists("addresses", "id")->where(function (
                    \Illuminate\Database\Query\Builder $query
                ) {
                    return $query->where("user_id", $this->input("user_id"));
                })
            ],
            "details" => ["required", "array"],
            "details.*.quantity" => ["required", "integer", "min:1", "max:10"],
            "details.*.product_id" => [
                "required",
                "integer",
                "exists:products,id",
                function ($attribute, $value, $fail) {
                    $productIds = array_column(
                        $this->input("details"),
                        "product_id"
                    );
                    if (
                        count($productIds) !== count(array_unique($productIds))
                    ) {
                        $fail("Los ids de los productos deben ser únicos");
                    }
                }
            ],
            "notes" => ["nullable", "string"],

            "address.first_name" => [
                "required_without:address_id",
                "string",
                "max:255"
            ],
            "address.last_name" => [
                "required_without:address_id",
                "string",
                "max:255"
            ],
            "address.dni" => [
                "required_without:address_id",
                "string",
                "size:8"
            ],
            "address.phone" => [
                "required_without:address_id",
                "string",
                "phone:PE,INTERNATIONAL"
            ],
            "address.department" => [
                "exclude_with:address_id",
                "required_if:is_delivery,true",
                "string",
                "max:255"
            ],
            "address.province" => [
                "exclude_with:address_id",
                "required_if:is_delivery,true",
                "string",
                "max:255"
            ],
            "address.district" => [
                "exclude_with:address_id",
                "required_if:is_delivery,true",
                "string",
                "max:255"
            ],
            "address.street_address" => [
                "exclude_with:address_id",
                "required_if:is_delivery,true",
                "string",
                "max:255"
            ],
            "address.zip_code" => [
                "nullable",
                "exclude_with:address_id",
                "string",
                "max:255"
            ],
            "address.reference" => [
                "nullable",
                "exclude_with:address_id",
                "string",
                "max:255"
            ]
        ];
    }
}
