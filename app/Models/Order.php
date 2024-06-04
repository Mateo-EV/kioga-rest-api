<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "amount",
        "user_id",
        "payment_method_id",
        "status",
        "shipping_amount",
        "is_delivery",
        "address_id",
        "notes"
    ];

    public static $status_enum = [
        "pendiente", // Creado
        "en espera", // En espera para ser recogido
        "enviado", // Enviado al cliente
        "entregado", // Entregado al cliente
        "cancelado", // Pedido cancelado por el cliente
        "reembolsado" // Reembolsado por el cliente
    ];

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

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}