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
            "amount" => 300.0,
            "user_id" => 1,
            "payment_method_id" => 1,
            "status" => fake()->randomElement(Order::$status_enum),
            "shipping_amount" => $isDelivery ? 5 : 0,
            "is_delivery" => $isDelivery,
            "address_id" => $isDelivery ? 2 : 1
        ];
    }
}
