<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isDelivery = fake()->randomElement([true, false]);

        return [
            "amount" => $isDelivery ? 305 : 300,
            "user_id" => 1,
            "status" => "Pendiente",
            "shipping_amount" => $isDelivery ? 5 : 0,
            "is_delivery" => $isDelivery,
            "address_id" => $isDelivery ? 2 : 1,
            "payment_id" => strval(fake()->numberBetween(10000, 99999))
        ];
    }
}
