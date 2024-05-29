<?php

namespace App\Models;

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
        "image",
        "stock",
        "category_id",
        "subcategory_id",
        "brand_id",
        "is_active"
    ];

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
}
