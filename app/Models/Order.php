<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "amount",
        "user_id",
        "status",
        "shipping_amount",
        "is_delivery",
        "address_id",
        "notes"
    ];

    public static $status_enum = [
        "Pendiente", // Creado
        "En Espera", // En espera para ser recogido
        "Enviado", // Enviado al cliente
        "Entregado", // Entregado al cliente
        "Cancelado", // Pedido cancelado por el cliente
        "Reembolsado" // Reembolsado por el cliente
    ];

    protected $appends = ["code"];

    protected function code(): Attribute
    {
        return Attribute::get(
            fn(mixed $_, array $attr) => "P" .
                str_pad($attr["id"], 8, "0", STR_PAD_LEFT)
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    protected function casts()
    {
        return [
            "amount" => "double",
            "shipping_amount" => "double",
            "is_delivery" => "boolean"
        ];
    }
}
