<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ["name", "slug", "image"];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function brands()
    {
        return $this->hasManyThrough(Brand::class, Product::class);
    }

    protected function image()
    {
        return Attribute::get(
            fn(string $value) => config("app.url") .
                "/storage/categories/" .
                $value
        );
    }
}
