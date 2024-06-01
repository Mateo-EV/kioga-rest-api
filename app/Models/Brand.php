<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ["name", "slug", "image"];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected function image()
    {
        return Attribute::get(
            fn(string $value) => config("app.url") . "/storage/brands/" . $value
        );
    }
}
