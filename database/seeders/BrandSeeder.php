<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Brand::truncate();

        $brands = [
            "Aerocool", //1
            "Amd", //2
            "Antec", //3
            "Antryx", //4
            "Aoc", //5
            "Arctic", //6
            "Asrock", //7
            "Asus", //8
            "Blue", //9
            "Canon", //10
            "Cdp", //11
            "Cooler Master", //12
            "Corsair", //13
            "Creative", //14
            "Deepcool", //15
            "Elise", //16
            "Epson", //17
            "Evga", //18
            "Fifine", //19
            "Gamemax", //20
            "Genius", //21
            "Gigabyte", //22
            "Hp", //23
            "Hyperx", //24
            "Intel", //25
            "Kingston", //26
            "Lenovo", //27
            "Lg", //28
            "Lian Li", //29
            "Logitech", //30
            "Microsoft", //31
            "Msi", //32
            "Halion", //33
            "Patriot", //34
            "Pny", //35
            "Primus Gaming", //36
            "Razer", //37
            "Redragon", //38
            "Samsung", //39
            "Seagate", //40
            "Seasonic", //41
            "Streamplify", //42
            "T-Dagger", //43
            "Team Group", //44
            "Teros", //45
            "Tp-Link", //46
            "Vsg", //47
            "Western Digital", //48
            "Xblade", //49
            "Xiaomi", //50
            "Xpg", //51
            "Zotac", //52
            "Zowie", //53
            "Kioga", //54,
            "Havit" //55
        ];

        foreach ($brands as $key => $brand_name) {
            $now = now();
            $brands[$key] = [
                "name" => $brand_name,
                "slug" => Str::slug($brand_name),
                "image" => Str::slug($brand_name) . ".png",
                "created_at" => $now,
                "updated_at" => $now
            ];
        }

        DB::table("brands")->insert($brands);
    }
}
