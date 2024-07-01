<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function cancelOrder(User $user, Order $order)
    {
        return $user->id === $order->user_id &&
            ($order->status === "Pendiente" || $order->status === "En Espera");
    }
}
