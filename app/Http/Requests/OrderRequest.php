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
        return [
            "user_id" => ["required", "integer", "min:1", "exists:users,id"],
            "payment_method_id" => [
                "required",
                "integer",
                "min:1",
                "exists:payment_methods,id"
            ],
            "status" => [
                "required",
                "int",
                "between:0," . count(Order::$status_enum)
            ],
            "is_delivery" => ["required", "boolean"],
            "shipping_amount" => [
                "exclude_if:is_delivery,false",
                "required_if:is_delivery,true",
                "decimal:2",
                "min:0"
            ],
            "address_id" => [
                "nullable",
                "integer",
                Rule::exists("addresses")->where(function (
                    \Illuminate\Database\Query\Builder $query,
                    int $value
                ) {
                    return $query
                        ->where("address_id", $value)
                        ->where("user_id", $this->input("user_id"));
                })
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
                "phone"
            ],
            "address.departement" => [
                "required_if:is_delivery,true",
                "exclude_with:address_id",
                "string",
                "max:255"
            ],
            "address.province" => [
                "required_if:is_delivery,true",
                "exclude_with:address_id",
                "string",
                "max:255"
            ],
            "address.district" => [
                "required_if:is_delivery,true",
                "exclude_with:address_id",
                "string",
                "max:255"
            ],
            "address.street_address" => [
                "required_if:is_delivery,true",
                "exclude_with:address_id",
                "string",
                "max:255"
            ],
            "address.zip_code" => [
                "required_if:is_delivery,true",
                "exclude_with:address_id",
                "string",
                "max:255"
            ],
            "address.reference" => [
                "required_if:is_delivery,true",
                "exclude_with:address_id",
                "string",
                "max:255"
            ]
        ];
    }
}
