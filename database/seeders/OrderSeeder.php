<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
            [
                "user_id" => 1,
                "first_name" => "Mateo",
                "last_name" => "Rioja",
                "dni" => "77030293",
                "phone" => "977895791",
                "department" => null,
                "province" => null,
                "district" => null,
                "street_address" => null
            ],
            [
                "user_id" => 1,
                "first_name" => "Mateo",
                "last_name" => "Rioja",
                "dni" => "77030293",
                "phone" => "977895791",
                "department" => "Ica",
                "province" => "Ica",
                "district" => "Ica",
                "zip-code" => "990000",
                "street_address" => "San Joaquin K-21"
            ]
        ];

        DB::table("addresses")->insert($addresses);

        Order::factory(10)
            ->has(OrderProduct::factory()->count(4), "details")
            ->create();
    }
}
