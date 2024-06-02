<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            "name" => "Mateo",
            "email" => "riojamatthew@gmail.com"
        ]);

        Admin::factory()->create([
            "name" => "Mateo",
            "email" => "riojamatthew@gmail.com"
        ]);

        PaymentMethod::create([
            "name" => "PayPal"
        ]);

        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class
        ]);
    }
}
