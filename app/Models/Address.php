<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "first_name",
        "last_name",
        "dni",
        "phone",
        "department",
        "province",
        "district",
        "street_address",
        "zip_code",
        "reference"
    ];

    public $timestamps = false;

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function fullName(): Attribute
    {
        return Attribute::get(
            fn(mixed $_, array $attr) => $attr["first_name"] .
                " " .
                $attr["last_name"]
        );
    }

    protected function first_name(): Attribute
    {
        return Attribute::set(fn(mixed $value) => ucwords(strtolower($value)));
    }

    protected function last_name(): Attribute
    {
        return Attribute::set(fn(mixed $value) => ucwords(strtolower($value)));
    }
}
