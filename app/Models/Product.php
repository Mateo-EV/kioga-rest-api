<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "slug",
        "description",
        "price",
        "discount",
        "image",
        "stock",
        "category_id",
        "subcategory_id",
        "brand_id",
        "is_active"
    ];

    public static $fields_for_customers = [
        "id",
        "name",
        "slug",
        "description",
        "price",
        "discount",
        "image",
        "stock",
        "category_id",
        "subcategory_id",
        "brand_id"
    ];

    protected function casts(): array
    {
        return [
            "is_active" => "boolean",
            "price" => "double",
            "discount" => "double",
            "price_discounted" => "double",
            "stock" => "integer"
        ];
    }

    protected function image(): Attribute
    {
        return Attribute::get(
            fn(string $value) => config("app.url") .
                "/storage/products/" .
                $value
        );
    }

    protected static function booted(): void
    {
        static::addGlobalScope("price_discounted", function (Builder $builder) {
            $builder->selectRaw(
                "CAST(products.price * (1 - products.discount) AS DECIMAL(10,2)) as price_discounted"
            );
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function order_products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    protected function originalImageUrl(): Attribute
    {
        return Attribute::get(
            fn(mixed $_, array $attributes) => $attributes["image"]
        );
    }
}
