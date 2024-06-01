<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::truncate();

        $products = [
            [
                "name" => "Case C/fuente Teros Te-1025 + 600w",
                "price" => 90.0,
                "brand_id" => 45,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Teros Te-1025 + 600w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Teros Te-1075 + 250w",
                "price" => 95.0,
                "brand_id" => 45,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Teros Te-1075 + 250w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Teros Te-1149n + 450w",
                "price" => 155.0,
                "brand_id" => 45,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Teros Te-1149n + 450w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Halion Stuka Cr11 Black +500w",
                "price" => 215.0,
                "brand_id" => 33,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Halion Stuka Cr11 Black +500w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Halion Polaris Cr13 Black +500w",
                "price" => 219.0,
                "brand_id" => 33,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Halion Polaris Cr13 Black +500w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Antryx Xtreme Nc-257 + B500w",
                "price" => 245.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Antryx Xtreme Nc-257 + B500w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Halion Scarlet RGB +500w",
                "price" => 285.0,
                "brand_id" => 33,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Halion Scarlet RGB +500w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Antryx Xtreme Nc-253 + B500w",
                "price" => 245.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Antryx Xtreme Nc-253 + B500w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Gamemax Shine G517 + 550w",
                "price" => 305.0,
                "brand_id" => 20,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Gamemax Shine G517 + 550w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Antec Nx4155 + 550w",
                "price" => 330.0,
                "brand_id" => 3,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Antec Nx4155 + 550w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Halion Delta 110 +600w",
                "price" => 135.0,
                "brand_id" => 33,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Halion Delta 110 +600w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Teros Te11411n + 450w",
                "price" => 219.0,
                "brand_id" => 45,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Teros Te11411n + 450w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Teros Te11412n + 450w (midtower)",
                "price" => 219.0,
                "brand_id" => 45,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Teros Te11412n + 450w (midtower), diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Halion Stuka Cr11 White +500w",
                "price" => 220.0,
                "brand_id" => 33,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Halion Stuka Cr11 White +500w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Halion Maverick Cr12 +450w",
                "price" => 225.0,
                "brand_id" => 33,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Halion Maverick Cr12 +450w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Halion Lighting +500w",
                "price" => 240.0,
                "brand_id" => 33,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Halion Lighting +500w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Halion Falcon +500w",
                "price" => 245.0,
                "brand_id" => 33,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Halion Falcon +500w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Halion Fury +500w",
                "price" => 245.0,
                "brand_id" => 33,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Halion Fury +500w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Halion Flash +500w",
                "price" => 267.0,
                "brand_id" => 33,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Halion Flash +500w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case C/fuente Antec Nx2555 + 550w",
                "price" => 310.0,
                "brand_id" => 3,
                "category_id" => 1,
                "subcategory_id" => 1,
                "description" =>
                    "Explora el increíble Case C/fuente Antec Nx2555 + 550w, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Deepcool Matrexx 30 Mini Tower",
                "price" => 155.0,
                "brand_id" => 15,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Deepcool Matrexx 30 Mini Tower, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Gamemax Edge Black Rainbow",
                "price" => 155.0,
                "brand_id" => 20,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Gamemax Edge Black Rainbow, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Gamemax Storm Bk Gb Black 4 Fan Rainbow",
                "price" => 155.0,
                "brand_id" => 20,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Gamemax Storm Bk Gb Black 4 Fan Rainbow, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Aerocool Trinity Mini White",
                "price" => 195.0,
                "brand_id" => 1,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Aerocool Trinity Mini White, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Antryx Rx 450 Black",
                "price" => 225.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Antryx Rx 450 Black, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Antryx Rx 470 Black",
                "price" => 225.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Antryx Rx 470 Black, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Aerocool Blade Black",
                "price" => 189.0,
                "brand_id" => 1,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Aerocool Blade Black, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Gamemax Revolt 4xrgb",
                "price" => 235.0,
                "brand_id" => 20,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Gamemax Revolt 4xrgb, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Gamemax Defender Tg ARGB (m-atx)",
                "price" => 235.0,
                "brand_id" => 20,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Gamemax Defender Tg ARGB (m-atx), diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Antryx Rx 430u Black",
                "price" => 239.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Antryx Rx 430u Black, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Gamemax Siege Black ARGB",
                "price" => 250.0,
                "brand_id" => 20,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Gamemax Siege Black ARGB, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Gamemax Destroyer Tgb Black ARGB",
                "price" => 250.0,
                "brand_id" => 20,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Gamemax Destroyer Tgb Black ARGB, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Deepcool Matrexx 40 3fs Mini Tower",
                "price" => 255.0,
                "brand_id" => 15,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Deepcool Matrexx 40 3fs Mini Tower, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Gamemax Destroyer Tgw White ARGB",
                "price" => 255.0,
                "brand_id" => 20,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Gamemax Destroyer Tgw White ARGB, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Gamemax Contact Coc Turbo Black/red",
                "price" => 270.0,
                "brand_id" => 20,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Gamemax Contact Coc Turbo Black/red, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Antryx Rx 460 Mesh Black",
                "price" => 280.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Antryx Rx 460 Mesh Black, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Antryx Rx 460 Mesh White",
                "price" => 290.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Antryx Rx 460 Mesh White, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Gamemax Bruffen C1 4xrgb Coc",
                "price" => 295.0,
                "brand_id" => 20,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Gamemax Bruffen C1 4xrgb Coc, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Antec Df600 Flux",
                "price" => 315.0,
                "brand_id" => 3,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Antec Df600 Flux, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Case Antec Nx800 Black",
                "price" => 359.0,
                "brand_id" => 3,
                "category_id" => 1,
                "subcategory_id" => 2,
                "description" =>
                    "Explora el increíble Case Antec Nx800 Black, diseñado para ofrecer un rendimiento excepcional y un estilo único en tu equipo."
            ],
            [
                "name" => "Fan Gamemax Ringforce 120mm Red",
                "price" => 28.0,
                "brand_id" => 20,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Gamemax Ringforce 120mm Red, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Fan Aerocool Spectro 12 Frgb Molex",
                "price" => 29.0,
                "brand_id" => 1,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Aerocool Spectro 12 Frgb Molex, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Fan Antryx Df260 ARGB",
                "price" => 39.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Antryx Df260 ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Fan Antryx Df310 White ARGB",
                "price" => 49.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Antryx Df310 White ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Controlador ARGB Antryx Spectrum",
                "price" => 59.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Controlador ARGB Antryx Spectrum, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Kit P/video Vertical Atryx Destroyer",
                "price" => 92.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Kit P/video Vertical Atryx Destroyer, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Cable Extensor Antryx Spectrum 8x2 ARGB",
                "price" => 135.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Cable Extensor Antryx Spectrum 8x2 ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Fan Kit(3 Fan + Controller) Aerocool Mirage 12 ARGB Pro",
                "price" => 155.0,
                "brand_id" => 1,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Kit(3 Fan + Controller) Aerocool Mirage 12 ARGB Pro, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Cable Extensor Antryx Spectrum 24x1 ARGB",
                "price" => 155.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Cable Extensor Antryx Spectrum 24x1 ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Fan Kit(3 Fan + Controller) Antryx Lynk Fan Lf120 White",
                "price" => 162.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Kit(3 Fan + Controller) Antryx Lynk Fan Lf120 White, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Fan Kit(3 Fan + Controller) Antryx Spectrum 310 ARGB",
                "price" => 165.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Kit(3 Fan + Controller) Antryx Spectrum 310 ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Fan Kit(3 Fan + Controller) Cooler Master Sickleflow White 120mm",
                "price" => 175.0,
                "brand_id" => 12,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Kit(3 Fan + Controller) Cooler Master Sickleflow White 120mm, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Fan Kit(3 Fan + Controller) Lian Li St120 White ARGB",
                "price" => 199.0,
                "brand_id" => 29,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Kit(3 Fan + Controller) Lian Li St120 White ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Fan Kit(3 Fan + Controller) Lian Li St120 Black ARGB",
                "price" => 199.0,
                "brand_id" => 29,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Kit(3 Fan + Controller) Lian Li St120 Black ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Fan Kit(3 Fan + Controller) Deepcool Mf120 Gt ARGB",
                "price" => 230.0,
                "brand_id" => 15,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Kit(3 Fan + Controller) Deepcool Mf120 Gt ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Fan Gamemax Ringforce 120mm Green",
                "price" => 28.0,
                "brand_id" => 20,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Gamemax Ringforce 120mm Green, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Fan Xpg Vento 120 ARGB",
                "price" => 35.0,
                "brand_id" => 51,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Xpg Vento 120 ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Fan Antryx Df310 Black ARGB",
                "price" => 45.0,
                "brand_id" => 4,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Antryx Df310 Black ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Fan Kit(3 Fan + Controller) Cooler Master Sickleflow Black 120mm",
                "price" => 165.0,
                "brand_id" => 12,
                "category_id" => 1,
                "subcategory_id" => 3,
                "description" =>
                    "Disfruta del Fan Kit(3 Fan + Controller) Cooler Master Sickleflow Black 120mm, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Placa Amd Am4 Msi A520m-a Pro",
                "price" => 250.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Msi A520m-a Pro te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am5 Msi Pro A620m-e Ddr5",
                "price" => 352.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am5 Msi Pro A620m-e Ddr5 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Msi B550m Pro-vdh",
                "price" => 370.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Msi B550m Pro-vdh te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Gigabyte B450m Ds3h Wifi",
                "price" => 385.0,
                "brand_id" => 22,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Gigabyte B450m Ds3h Wifi te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Msi B550m Pro-vdh Wifi",
                "price" => 410.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Msi B550m Pro-vdh Wifi te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Gigabyte B550m Ds3h Ac",
                "price" => 435.0,
                "brand_id" => 22,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Gigabyte B550m Ds3h Ac te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am5 Msi Pro B650m-p Ddr5",
                "price" => 535.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am5 Msi Pro B650m-p Ddr5 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Asus X570-p",
                "price" => 775.0,
                "brand_id" => 8,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Asus X570-p te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Gigabyte B550 Aorus Elite Ax V2",
                "price" => 855.0,
                "brand_id" => 22,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Gigabyte B550 Aorus Elite Ax V2 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" =>
                    "Placa Amd Am5 Asus Prime B650m-a- Ax Wifi/bluetooth Ddr5",
                "price" => 885.0,
                "brand_id" => 8,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am5 Asus Prime B650m-a- Ax Wifi/bluetooth Ddr5 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Msi A520m Pro-vh",
                "price" => 268.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Msi A520m Pro-vh te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Gigabyte B450m-ds3h V2",
                "price" => 329.0,
                "brand_id" => 22,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Gigabyte B450m-ds3h V2 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Asus Prime B450m-a Ii",
                "price" => 355.0,
                "brand_id" => 8,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Asus Prime B450m-a Ii te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Msi Pro B550m-p Gen3",
                "price" => 380.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Msi Pro B550m-p Gen3 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Msi B550m-a Pro",
                "price" => 405.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Msi B550m-a Pro te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Asus Tuf Gaming B450m-plus Ii",
                "price" => 405.0,
                "brand_id" => 8,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Asus Tuf Gaming B450m-plus Ii te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Gigabyte B450m Aorus Elite",
                "price" => 430.0,
                "brand_id" => 22,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Gigabyte B450m Aorus Elite te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Gigabyte B550m-ds3h",
                "price" => 475.0,
                "brand_id" => 22,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Gigabyte B550m-ds3h te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Asus Prime B550m-k",
                "price" => 495.0,
                "brand_id" => 8,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Asus Prime B550m-k te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Amd Am4 Asus Prime B550m-a Ac",
                "price" => 510.0,
                "brand_id" => 8,
                "category_id" => 2,
                "subcategory_id" => 4,
                "description" =>
                    "La Placa Amd Am4 Asus Prime B550m-a Ac te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1200 Msi B560m Pro-e",
                "price" => 315.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1200 Msi B560m Pro-e te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1700 Msi H610m-g Ddr4",
                "price" => 430.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1700 Msi H610m-g Ddr4 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1700 Msi Pro B760m-p Ddr4",
                "price" => 445.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1700 Msi Pro B760m-p Ddr4 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1700 Gigabyte B760m Ds3h Ddr4",
                "price" => 525.0,
                "brand_id" => 22,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1700 Gigabyte B760m Ds3h Ddr4 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1700 Gigabyte B760m Ds3h Ax Ddr4",
                "price" => 592.0,
                "brand_id" => 22,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1700 Gigabyte B760m Ds3h Ax Ddr4 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1700 Gigabyte B760m Ds3h Ax Ddr5",
                "price" => 690.0,
                "brand_id" => 22,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1700 Gigabyte B760m Ds3h Ax Ddr5 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1700 Msi Mag B660m Mortar Wifi Ddr4",
                "price" => 769.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1700 Msi Mag B660m Mortar Wifi Ddr4 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1700 Gigabyte B760 Gaming X Ax Ddr5",
                "price" => 889.0,
                "brand_id" => 22,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1700 Gigabyte B760 Gaming X Ax Ddr5 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" =>
                    "Placa Intel Lga1700 Gigabyte Z790 Aorus Elite Ax Ddr5",
                "price" => 1369.0,
                "brand_id" => 22,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1700 Gigabyte Z790 Aorus Elite Ax Ddr5 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1200 Gigabyte H510m-h",
                "price" => 310.0,
                "brand_id" => 25,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1200 Gigabyte H510m-h te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1200 Gigabyte H470m-h",
                "price" => 310.0,
                "brand_id" => 22,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1200 Gigabyte H470m-h te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1200 Msi H510m Pro-e",
                "price" => 315.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1200 Msi H510m Pro-e te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1200 Asus H510m-e",
                "price" => 320.0,
                "brand_id" => 8,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1200 Asus H510m-e te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1200 Msi B560m Pro-vdh",
                "price" => 355.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1200 Msi B560m Pro-vdh te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1200 Msi B460m Pro-vdh",
                "price" => 445.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1200 Msi B460m Pro-vdh te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1200 Asus Prime B460m-a R2.0",
                "price" => 475.0,
                "brand_id" => 8,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1200 Asus Prime B460m-a R2.0 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1200 Asus Prime B560-plus",
                "price" => 535.0,
                "brand_id" => 8,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1200 Asus Prime B560-plus te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1700 Msi Pro B660m-a Ddr4",
                "price" => 575.0,
                "brand_id" => 32,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1700 Msi Pro B660m-a Ddr4 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1700 Asus B660m-a Wifi D4 Ddr4",
                "price" => 775.0,
                "brand_id" => 8,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1700 Asus B660m-a Wifi D4 Ddr4 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Placa Intel Lga1700 Gigabyte B660m Gaming Ax Ddr4",
                "price" => 835.0,
                "brand_id" => 22,
                "category_id" => 2,
                "subcategory_id" => 5,
                "description" =>
                    "La Placa Intel Lga1700 Gigabyte B660m Gaming Ax Ddr4 te brinda la mejor tecnología para potenciar tu sistema con una estabilidad y eficiencia inigualables."
            ],
            [
                "name" => "Procesador Amd Ryzen 5 4500",
                "price" => 350.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 5 4500 lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 5 4600g",
                "price" => 415.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 5 4600g lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 5 5600g",
                "price" => 595.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 5 5600g lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 5 5600",
                "price" => 640.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 5 5600 lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 7 5700g",
                "price" => 789.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 7 5700g lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 7 5700x",
                "price" => 879.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 7 5700x lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 5 7600",
                "price" => 895.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 5 7600 lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 7 5800x",
                "price" => 1099.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 7 5800x lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 5 8600g",
                "price" => 1099.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 5 8600g lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 7 7700",
                "price" => 1445.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 7 7700 lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 9 5900x",
                "price" => 1475.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 9 5900x lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 7 5800x3d",
                "price" => 1495.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 7 5800x3d lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 7 8700g",
                "price" => 1579.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 7 8700g lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 9 7900",
                "price" => 1985.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 9 7900 lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 7 7800x3d",
                "price" => 2035.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 7 7800x3d lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 9 7950x",
                "price" => 2639.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 9 7950x lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 9 7950x3d",
                "price" => 3185.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 9 7950x3d lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 3 3200g",
                "price" => 345.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 3 3200g lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 5 5500",
                "price" => 429.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 5 5500 lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Amd Ryzen 5 5600x",
                "price" => 759.0,
                "brand_id" => 2,
                "category_id" => 3,
                "subcategory_id" => 6,
                "description" =>
                    "El Procesador Amd Ryzen 5 5600x lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I3 10105f",
                "price" => 320.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I3 10105f lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I3 12100f",
                "price" => 465.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I3 12100f lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I3 10105",
                "price" => 525.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I3 10105 lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I5 11400f",
                "price" => 579.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I5 11400f lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I5 12400f",
                "price" => 619.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I5 12400f lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I5 10400",
                "price" => 629.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I5 10400 lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I5 11400",
                "price" => 659.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I5 11400 lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I7 12700f",
                "price" => 1250.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I7 12700f lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I5 13600kf",
                "price" => 1409.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I5 13600kf lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I7 13700kf",
                "price" => 1939.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I7 13700kf lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I9 13900k",
                "price" => 2900.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I9 13900k lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I3 10100f",
                "price" => 285.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I3 10100f lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I5 10400f",
                "price" => 490.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I5 10400f lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I7 11700f",
                "price" => 869.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I7 11700f lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I5 13400f",
                "price" => 996.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I5 13400f lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I7 10700f",
                "price" => 1290.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I7 10700f lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I5 12600kf",
                "price" => 1325.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I5 12600kf lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I7 12700kf",
                "price" => 1750.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I7 12700kf lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I7 13700f",
                "price" => 1795.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I7 13700f lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Procesador Intel Core I9 12900f",
                "price" => 2505.0,
                "brand_id" => 25,
                "category_id" => 3,
                "subcategory_id" => 7,
                "description" =>
                    "El Procesador Intel Core I9 12900f lleva tu computadora a un nuevo nivel de velocidad y rendimiento."
            ],
            [
                "name" => "Ram Team Group Elite Plus 8gb Ddr3 1600mhz",
                "price" => 95.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group Elite Plus 8gb Ddr3 1600mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Team Group T-force Vulcanz Red 8gb Ddr4 3200mhz",
                "price" => 99.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group T-force Vulcanz Red 8gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Team Group T-force Vulcanz Tuf 8gb Ddr4 3200mhz",
                "price" => 99.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group T-force Vulcanz Tuf 8gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Kingston Fury Beast 8gb Ddr4 3200mhz Cl16",
                "price" => 105.0,
                "brand_id" => 26,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Kingston Fury Beast 8gb Ddr4 3200mhz Cl16, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Pny Xlr8 RGB Silver 8gb Ddr4 3200mhz",
                "price" => 150.0,
                "brand_id" => 35,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Pny Xlr8 RGB Silver 8gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Xpg Spectrix D41 Tuf 8gb Ddr4 3200mhz",
                "price" => 170.0,
                "brand_id" => 51,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Xpg Spectrix D41 Tuf 8gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Kingston Fury Beast 8gb Ddr5 6000mhz Cl40",
                "price" => 175.0,
                "brand_id" => 26,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Kingston Fury Beast 8gb Ddr5 6000mhz Cl40, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Ram Team Group T-force Delta R Black 16gb Ddr4 3200mhz",
                "price" => 189.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group T-force Delta R Black 16gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Ram Team Group T-force Delta R White 16gb Ddr4 3200mhz",
                "price" => 189.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group T-force Delta R White 16gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Ram Team Group T-force Delta R Black 16gb(2x8) Ddr4 3600mhz",
                "price" => 210.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group T-force Delta R Black 16gb(2x8) Ddr4 3600mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Ram Team Group T-force Delta R White 16gb(2x8) Ddr4 3600mhz",
                "price" => 210.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group T-force Delta R White 16gb(2x8) Ddr4 3600mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Ram Team Group T-force Night Hawk White 16gb(2x8) Ddr4 3200mhz",
                "price" => 325.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group T-force Night Hawk White 16gb(2x8) Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Ram Team Group T-force Vulcanz Gray 8gb Ddr4 3200mhz",
                "price" => 99.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group T-force Vulcanz Gray 8gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Ram Team Group T-force Delta R Black 8gb Ddr4 3200mhz",
                "price" => 112.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group T-force Delta R Black 8gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Team Group T-force Delta R Tuf 8gb Ddr4 3200mhz",
                "price" => 112.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group T-force Delta R Tuf 8gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Ram Team Group T-force Delta R White 8gb Ddr4 3200mhz",
                "price" => 112.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group T-force Delta R White 8gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Ram Team Group T-force Vulcanz Gray 16gb Ddr4 3200mhz",
                "price" => 179.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group T-force Vulcanz Gray 16gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Kingston Fury Beast 16gb Ddr4 3200mhz Cl16",
                "price" => 185.0,
                "brand_id" => 26,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Kingston Fury Beast 16gb Ddr4 3200mhz Cl16, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Ram Team Group T-force Delta R Tuf 16gb Ddr4 3200mhz",
                "price" => 189.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group T-force Delta R Tuf 16gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Ram Team Group T-force Vulcanz Red 16gb Ddr4 3200mhz",
                "price" => 199.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 8,
                "description" =>
                    "Disfruta del Ram Team Group T-force Vulcanz Red 16gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Sodimm Kingston 4gb Ddr4 2666mhz",
                "price" => 85.0,
                "brand_id" => 26,
                "category_id" => 4,
                "subcategory_id" => 9,
                "description" =>
                    "Disfruta del Ram Sodimm Kingston 4gb Ddr4 2666mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Sodimm Hp S1 8gb Ddr4 3200mhz",
                "price" => 89.0,
                "brand_id" => 23,
                "category_id" => 4,
                "subcategory_id" => 9,
                "description" =>
                    "Disfruta del Ram Sodimm Hp S1 8gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Sodimm Kingston Fury Impact 8gb Ddr4 3200mhz",
                "price" => 105.0,
                "brand_id" => 26,
                "category_id" => 4,
                "subcategory_id" => 9,
                "description" =>
                    "Disfruta del Ram Sodimm Kingston Fury Impact 8gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Sodimm Team Group Elite 8gb Ddr3l 1600mhz",
                "price" => 95.0,
                "brand_id" => 44,
                "category_id" => 4,
                "subcategory_id" => 9,
                "description" =>
                    "Disfruta del Ram Sodimm Team Group Elite 8gb Ddr3l 1600mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Sodimm Kingston Kvr 8gb Ddr5 4800mhz",
                "price" => 155.0,
                "brand_id" => 26,
                "category_id" => 4,
                "subcategory_id" => 9,
                "description" =>
                    "Disfruta del Ram Sodimm Kingston Kvr 8gb Ddr5 4800mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Sodimm Hp S1 16gb Ddr4 3200mhz",
                "price" => 165.0,
                "brand_id" => 23,
                "category_id" => 4,
                "subcategory_id" => 9,
                "description" =>
                    "Disfruta del Ram Sodimm Hp S1 16gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Sodimm Kingston Fury Impact 16gb Ddr4 3200mhz",
                "price" => 189.0,
                "brand_id" => 26,
                "category_id" => 4,
                "subcategory_id" => 9,
                "description" =>
                    "Disfruta del Ram Sodimm Kingston Fury Impact 16gb Ddr4 3200mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ram Sodimm Kingston Kvr 16gb Ddr5 4800mhz",
                "price" => 255.0,
                "brand_id" => 26,
                "category_id" => 4,
                "subcategory_id" => 9,
                "description" =>
                    "Disfruta del Ram Sodimm Kingston Kvr 16gb Ddr5 4800mhz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd 2.5 SATA Pny Cs900 120gb",
                "price" => 75.0,
                "brand_id" => 35,
                "category_id" => 5,
                "subcategory_id" => 10,
                "description" =>
                    "Disfruta del Ssd 2.5 SATA Pny Cs900 120gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd 2.5 SATA Team Group T-force Vulcanz 256gb",
                "price" => 105.0,
                "brand_id" => 44,
                "category_id" => 5,
                "subcategory_id" => 10,
                "description" =>
                    "Disfruta del Ssd 2.5 SATA Team Group T-force Vulcanz 256gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd 2.5 SATA Team Group T-force Vulcanz 512gb",
                "price" => 155.0,
                "brand_id" => 44,
                "category_id" => 5,
                "subcategory_id" => 10,
                "description" =>
                    "Disfruta del Ssd 2.5 SATA Team Group T-force Vulcanz 512gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd 2.5 SATA Team Group T-force Vulcanz 1tb",
                "price" => 285.0,
                "brand_id" => 44,
                "category_id" => 5,
                "subcategory_id" => 10,
                "description" =>
                    "Disfruta del Ssd 2.5 SATA Team Group T-force Vulcanz 1tb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd 2.5 SATA Msi Spatium S270 240gb",
                "price" => 75.0,
                "brand_id" => 32,
                "category_id" => 5,
                "subcategory_id" => 10,
                "description" =>
                    "Disfruta del Ssd 2.5 SATA Msi Spatium S270 240gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd 2.5 SATA Team Group T-force Vulcanz 240gb",
                "price" => 79.0,
                "brand_id" => 44,
                "category_id" => 5,
                "subcategory_id" => 10,
                "description" =>
                    "Disfruta del Ssd 2.5 SATA Team Group T-force Vulcanz 240gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd 2.5 Gigabyte 240gb",
                "price" => 85.0,
                "brand_id" => 22,
                "category_id" => 5,
                "subcategory_id" => 10,
                "description" =>
                    "Disfruta del Ssd 2.5 Gigabyte 240gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd 2.5 SATA Team Group Cx2 256gb",
                "price" => 89.0,
                "brand_id" => 44,
                "category_id" => 5,
                "subcategory_id" => 10,
                "description" =>
                    "Disfruta del Ssd 2.5 SATA Team Group Cx2 256gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd 2.5 SATA Team Group T-force Vulcanz 480gb",
                "price" => 105.0,
                "brand_id" => 44,
                "category_id" => 5,
                "subcategory_id" => 10,
                "description" =>
                    "Disfruta del Ssd 2.5 SATA Team Group T-force Vulcanz 480gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd 2.5 SATA Team Group Cx1 480gb",
                "price" => 169.0,
                "brand_id" => 44,
                "category_id" => 5,
                "subcategory_id" => 10,
                "description" =>
                    "Disfruta del Ssd 2.5 SATA Team Group Cx1 480gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd 2.5 SATA Pny Cs900 1tb",
                "price" => 299.0,
                "brand_id" => 35,
                "category_id" => 5,
                "subcategory_id" => 10,
                "description" =>
                    "Disfruta del Ssd 2.5 SATA Pny Cs900 1tb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd 2.5 SATA Team Group Cx2 2tb",
                "price" => 345.0,
                "brand_id" => 44,
                "category_id" => 5,
                "subcategory_id" => 10,
                "description" =>
                    "Disfruta del Ssd 2.5 SATA Team Group Cx2 2tb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd 2.5 SATA Team Group Cx2 1tb",
                "price" => 375.0,
                "brand_id" => 44,
                "category_id" => 5,
                "subcategory_id" => 10,
                "description" =>
                    "Disfruta del Ssd 2.5 SATA Team Group Cx2 1tb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Hdd 3.5 Western Digital Blue 1tb",
                "price" => 185.0,
                "brand_id" => 48,
                "category_id" => 5,
                "subcategory_id" => 12,
                "description" =>
                    "Disfruta del Hdd 3.5 Western Digital Blue 1tb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Hdd 2.5 Western Digital Blue 1tb",
                "price" => 240.0,
                "brand_id" => 48,
                "category_id" => 5,
                "subcategory_id" => 12,
                "description" =>
                    "Disfruta del Hdd 2.5 Western Digital Blue 1tb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Hdd 3.5 Western Digital Blue 2tb",
                "price" => 280.0,
                "brand_id" => 48,
                "category_id" => 5,
                "subcategory_id" => 12,
                "description" =>
                    "Disfruta del Hdd 3.5 Western Digital Blue 2tb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Hdd 3.5 Seagate Barracuda 2tb",
                "price" => 285.0,
                "brand_id" => 40,
                "category_id" => 5,
                "subcategory_id" => 12,
                "description" =>
                    "Disfruta del Hdd 3.5 Seagate Barracuda 2tb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Team Group Mp33 256gb",
                "price" => 115.0,
                "brand_id" => 44,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Team Group Mp33 256gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Western Digital Green Sn350 500gb",
                "price" => 175.0,
                "brand_id" => 48,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Western Digital Green Sn350 500gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Kingston Nv2 500gb - PCIE 4.0",
                "price" => 192.0,
                "brand_id" => 26,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Kingston Nv2 500gb - PCIE 4.0, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Team Group Mp44l 500gb PCIE 4.0",
                "price" => 245.0,
                "brand_id" => 44,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Team Group Mp44l 500gb PCIE 4.0, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Kingston Nv2 1tb - PCIE 4.0",
                "price" => 285.0,
                "brand_id" => 26,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Kingston Nv2 1tb - PCIE 4.0, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Hp Ex950 512gb",
                "price" => 345.0,
                "brand_id" => 23,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Hp Ex950 512gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Kingston Nv2 2tb - PCIE 4.0",
                "price" => 512.0,
                "brand_id" => 26,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Kingston Nv2 2tb - PCIE 4.0, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Kingston Nv2 250gb - PCIE 4.0",
                "price" => 138.0,
                "brand_id" => 26,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Kingston Nv2 250gb - PCIE 4.0, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Western Digital Green Sn350 480gb",
                "price" => 145.0,
                "brand_id" => 48,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Western Digital Green Sn350 480gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Team Group Mp33 512gb",
                "price" => 175.0,
                "brand_id" => 44,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Team Group Mp33 512gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Western Digital Green Sn350 1tb",
                "price" => 190.0,
                "brand_id" => 48,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Western Digital Green Sn350 1tb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Xpg Sx6000 Pro 512gb",
                "price" => 200.0,
                "brand_id" => 51,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Xpg Sx6000 Pro 512gb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Team Group Mp33 1tb",
                "price" => 279.0,
                "brand_id" => 44,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Team Group Mp33 1tb, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Team Group Mp44l 1tb PCIE 4.0",
                "price" => 410.0,
                "brand_id" => 44,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Team Group Mp44l 1tb PCIE 4.0, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Ssd M.2 NVME Kingston Fury Renegade 1tb With Heatsink - PCIE 4.0",
                "price" => 459.0,
                "brand_id" => 26,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Kingston Fury Renegade 1tb With Heatsink - PCIE 4.0, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ssd M.2 NVME Kingston Fury Renegade 1tb - PCIE 4.0",
                "price" => 475.0,
                "brand_id" => 26,
                "category_id" => 5,
                "subcategory_id" => 11,
                "description" =>
                    "Disfruta del Ssd M.2 NVME Kingston Fury Renegade 1tb - PCIE 4.0, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Tarj. De Video Evga Gt N210 1gb Gddr3",
                "price" => 175.0,
                "brand_id" => 18,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Evga Gt N210 1gb Gddr3, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Msi Ventus Xs Oc D6 Geforce Gtx 1650 4gb Gddr6",
                "price" => 649.0,
                "brand_id" => 32,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Msi Ventus Xs Oc D6 Geforce Gtx 1650 4gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Asus Dual Oc Geforce Rtx 3050 6gb Gddr6",
                "price" => 839.0,
                "brand_id" => 8,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Asus Dual Oc Geforce Rtx 3050 6gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Msi Ventus 2x 6g Oc Geforce Rtx 3050 6gb Gddr6",
                "price" => 855.0,
                "brand_id" => 32,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Msi Ventus 2x 6g Oc Geforce Rtx 3050 6gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Msi Ventus 2x Xs Oc Geforce Rtx 3050 8gb Gddr6",
                "price" => 999.0,
                "brand_id" => 32,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Msi Ventus 2x Xs Oc Geforce Rtx 3050 8gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Zotac Twin Fan Geforce Gtx 1660 Super 6gb Gddr6",
                "price" => 1082.0,
                "brand_id" => 52,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Zotac Twin Fan Geforce Gtx 1660 Super 6gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Asus Dual White Oc Geforce Rtx 3060 8gb Gddr6",
                "price" => 1350.0,
                "brand_id" => 8,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Asus Dual White Oc Geforce Rtx 3060 8gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Msi Ventus 2x Oc Geforce Rtx 4060 8gb Gddr6",
                "price" => 1360.0,
                "brand_id" => 32,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Msi Ventus 2x Oc Geforce Rtx 4060 8gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Asus Dual Evo Oc Geforce Rtx 4060 8gb Gddr6",
                "price" => 1385.0,
                "brand_id" => 8,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Asus Dual Evo Oc Geforce Rtx 4060 8gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Msi Ventus 2x Oc Geforce Rtx 4070 12gb Gddr6x",
                "price" => 2869.0,
                "brand_id" => 32,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Msi Ventus 2x Oc Geforce Rtx 4070 12gb Gddr6x, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Gigabyte Eagle Oc Geforce Rtx 4070 12gb Gddr6x",
                "price" => 3120.0,
                "brand_id" => 22,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Gigabyte Eagle Oc Geforce Rtx 4070 12gb Gddr6x, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Asus Tuf Gaming Geforce Rtx 4070ti 12gb Gddr6x",
                "price" => 3739.0,
                "brand_id" => 8,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Asus Tuf Gaming Geforce Rtx 4070ti 12gb Gddr6x, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Gigabyte Gaming Oc Geforce Rtx 4070ti 12gb Gddr6x",
                "price" => 3919.0,
                "brand_id" => 22,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Gigabyte Gaming Oc Geforce Rtx 4070ti 12gb Gddr6x, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Msi Ventus X3 Oc Geforce Rtx 4070ti 12gb Gddr6x",
                "price" => 3959.0,
                "brand_id" => 32,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Msi Ventus X3 Oc Geforce Rtx 4070ti 12gb Gddr6x, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Msi Ventus Xs Geforce Gtx 1630 4gb Gddr6",
                "price" => 665.0,
                "brand_id" => 32,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Msi Ventus Xs Geforce Gtx 1630 4gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Gigabyte Oc Geforce Gtx 1650 4gb Gddr6",
                "price" => 685.0,
                "brand_id" => 22,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Gigabyte Oc Geforce Gtx 1650 4gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Zotac Gaming Geforce Gtx 1650 4gb Gddr6",
                "price" => 732.0,
                "brand_id" => 52,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Zotac Gaming Geforce Gtx 1650 4gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Gigabyte Windforce D6 Geforce Gtx 1660 Ti 6gb Gddr6",
                "price" => 999.0,
                "brand_id" => 22,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Gigabyte Windforce D6 Geforce Gtx 1660 Ti 6gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Asus Dual Oc Geforce Rtx 3050 8gb Gddr6",
                "price" => 1150.0,
                "brand_id" => 8,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Asus Dual Oc Geforce Rtx 3050 8gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Zotac Twin Edge Geforce Rtx 3060 8gb Gddr6",
                "price" => 1250.0,
                "brand_id" => 52,
                "category_id" => 6,
                "subcategory_id" => 13,
                "description" =>
                    "Disfruta del Tarj. De Video Zotac Twin Edge Geforce Rtx 3060 8gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Asrock Phantom Gaming D Rx 6500xt 4gb Gddr6",
                "price" => 960.0,
                "brand_id" => 7,
                "category_id" => 6,
                "subcategory_id" => 14,
                "description" =>
                    "Disfruta del Tarj. De Video Asrock Phantom Gaming D Rx 6500xt 4gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Tarj. De Video Msi Mech 2x Oc Rx 6500xt 4gb Gddr6",
                "price" => 980.0,
                "brand_id" => 32,
                "category_id" => 6,
                "subcategory_id" => 14,
                "description" =>
                    "Disfruta del Tarj. De Video Msi Mech 2x Oc Rx 6500xt 4gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Tarj. De Video Msi Mech 2x Classic Oc Rx 7600 8gb Gddr6",
                "price" => 1380.0,
                "brand_id" => 32,
                "category_id" => 6,
                "subcategory_id" => 14,
                "description" =>
                    "Disfruta del Tarj. De Video Msi Mech 2x Classic Oc Rx 7600 8gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Tarj. De Video Gigabyte Gaming Oc Rx 7600 8gb Gddr6",
                "price" => 1570.0,
                "brand_id" => 22,
                "category_id" => 6,
                "subcategory_id" => 14,
                "description" =>
                    "Disfruta del Tarj. De Video Gigabyte Gaming Oc Rx 7600 8gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Tarj. De Video Msi Mech 2x Oc Rx 6650xt 8gb Gddr6",
                "price" => 1150.0,
                "brand_id" => 32,
                "category_id" => 6,
                "subcategory_id" => 14,
                "description" =>
                    "Disfruta del Tarj. De Video Msi Mech 2x Oc Rx 6650xt 8gb Gddr6, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Liquid Cooler Antryx Triton 120c ARGB",
                "price" => 239.0,
                "brand_id" => 4,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Liquid Cooler Antryx Triton 120c ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Liquid Cooler Evga Clc 120 Entry Level",
                "price" => 239.0,
                "brand_id" => 18,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Liquid Cooler Evga Clc 120 Entry Level, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Sistema De Enfriamiento Liquido Antryx Triton Evo 240 Black ARGB",
                "price" => 320.0,
                "brand_id" => 4,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Sistema De Enfriamiento Liquido Antryx Triton Evo 240 Black ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Liquid Cooler Aerocool Mirage L240 Pwm White",
                "price" => 325.0,
                "brand_id" => 1,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Liquid Cooler Aerocool Mirage L240 Pwm White, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Sistema De Enfriamiento Liquido Antryx Triton Evo 240 White ARGB",
                "price" => 330.0,
                "brand_id" => 4,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Sistema De Enfriamiento Liquido Antryx Triton Evo 240 White ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Sistema De Enfriamiento Liquido Antryx Triton Infinity 240 Black ARGB",
                "price" => 375.0,
                "brand_id" => 4,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Sistema De Enfriamiento Liquido Antryx Triton Infinity 240 Black ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Sistema De Enfriamiento Liquido Antryx Triton Infinity 240 White ARGB",
                "price" => 375.0,
                "brand_id" => 4,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Sistema De Enfriamiento Liquido Antryx Triton Infinity 240 White ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Liquid Cooler Cm Masterliquid Ml240l V2 Black ARGB",
                "price" => 399.0,
                "brand_id" => 12,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Liquid Cooler Cm Masterliquid Ml240l V2 Black ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Liquid Cooler Cm Masterliquid Ml240l V2 White ARGB",
                "price" => 389.0,
                "brand_id" => 12,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Liquid Cooler Cm Masterliquid Ml240l V2 White ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Sistema De Enfriamiento Liquido Antryx Triton Evo 360 White ARGB",
                "price" => 429.0,
                "brand_id" => 4,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Sistema De Enfriamiento Liquido Antryx Triton Evo 360 White ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Sistema De Enfriamiento Liquido Antryx Triton Infinity 360 Black ARGB",
                "price" => 449.0,
                "brand_id" => 4,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Sistema De Enfriamiento Liquido Antryx Triton Infinity 360 Black ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Sistema De Enfriamiento Liquido Antryx Triton Infinity 360 White ARGB",
                "price" => 459.0,
                "brand_id" => 4,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Sistema De Enfriamiento Liquido Antryx Triton Infinity 360 White ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Liquid Cooler Lian Li Galahad 240 Black ARGB",
                "price" => 495.0,
                "brand_id" => 29,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Liquid Cooler Lian Li Galahad 240 Black ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Liquid Cooler Lian Li Galahad 240 White ARGB",
                "price" => 505.0,
                "brand_id" => 29,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Liquid Cooler Lian Li Galahad 240 White ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Liquid Cooler Evga Clc 360 RGB",
                "price" => 619.0,
                "brand_id" => 18,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Liquid Cooler Evga Clc 360 RGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Liquid Cooler Corsair Icue H115i Elite Capellix",
                "price" => 779.0,
                "brand_id" => 13,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Liquid Cooler Corsair Icue H115i Elite Capellix, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Liquid Cooler Aerocool Mirage L240 Pwm Black",
                "price" => 315.0,
                "brand_id" => 1,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Liquid Cooler Aerocool Mirage L240 Pwm Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Liquid Cooler Antryx Triton 240c ARGB",
                "price" => 335.0,
                "brand_id" => 4,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Liquid Cooler Antryx Triton 240c ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Liquid Cooler Antryx Triton 360c ARGB",
                "price" => 435.0,
                "brand_id" => 4,
                "category_id" => 7,
                "subcategory_id" => 15,
                "description" =>
                    "Disfruta del Liquid Cooler Antryx Triton 360c ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Antryx Mirage 210 ARGB",
                "price" => 79.0,
                "brand_id" => 4,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Antryx Mirage 210 ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Antryx Mirage 410 ARGB",
                "price" => 115.0,
                "brand_id" => 4,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Antryx Mirage 410 ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Deepcool Gammaxx Gte V2 White",
                "price" => 135.0,
                "brand_id" => 15,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Deepcool Gammaxx Gte V2 White, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Antec A400 RGB",
                "price" => 145.0,
                "brand_id" => 3,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Antec A400 RGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Antryx Mirage Infinity Black ARGB",
                "price" => 155.0,
                "brand_id" => 4,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Antryx Mirage Infinity Black ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Antryx Mirage Infinity White ARGB",
                "price" => 155.0,
                "brand_id" => 4,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Antryx Mirage Infinity White ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Redragon Cc-2000",
                "price" => 159.0,
                "brand_id" => 38,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Redragon Cc-2000, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Aerocool Cylon 4f ARGB Pwm 4p Black",
                "price" => 159.0,
                "brand_id" => 1,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Aerocool Cylon 4f ARGB Pwm 4p Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Aerocool Cylon 4f ARGB Pwm 4p White",
                "price" => 169.0,
                "brand_id" => 1,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Aerocool Cylon 4f ARGB Pwm 4p White, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Air Cooler Cooler Master Hyper 212 RGB Black Edition",
                "price" => 225.0,
                "brand_id" => 12,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Cooler Master Hyper 212 RGB Black Edition, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Cooler Master Masterair G100m Gm",
                "price" => 235.0,
                "brand_id" => 12,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Cooler Master Masterair G100m Gm, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Cooler Master Ma410m ARGB",
                "price" => 309.0,
                "brand_id" => 12,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Cooler Master Ma410m ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Gigabyte Aorus Gp-atc800",
                "price" => 445.0,
                "brand_id" => 22,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Gigabyte Aorus Gp-atc800, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Deepcool Gammaxx 300r Red LED",
                "price" => 89.0,
                "brand_id" => 15,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Deepcool Gammaxx 300r Red LED, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Cooler Master Hyper H410r Red",
                "price" => 99.0,
                "brand_id" => 12,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Cooler Master Hyper H410r Red, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Deepcool Gammaxx Ag400 ARGB",
                "price" => 125.0,
                "brand_id" => 15,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Deepcool Gammaxx Ag400 ARGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Cooler Master Hyper H410r RGB",
                "price" => 135.0,
                "brand_id" => 12,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Cooler Master Hyper H410r RGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Deepcool Gammaxx 400 V2 Blue",
                "price" => 135.0,
                "brand_id" => 15,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Deepcool Gammaxx 400 V2 Blue, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Deepcool Gammaxx Gte V2 RGB",
                "price" => 145.0,
                "brand_id" => 15,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Deepcool Gammaxx Gte V2 RGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Air Cooler Cooler Master Hyper 212 Spectrum V2",
                "price" => 150.0,
                "brand_id" => 12,
                "category_id" => 7,
                "subcategory_id" => 16,
                "description" =>
                    "Disfruta del Air Cooler Cooler Master Hyper 212 Spectrum V2, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Fuente Gamemax Gp Series Gp-650 650w 80+ Bronze",
                "price" => 210.0,
                "brand_id" => 20,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Gamemax Gp Series Gp-650 650w 80+ Bronze ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" =>
                    "Fuente Gamemax Gp Series Gp-650 650w 80+ Bronze White",
                "price" => 210.0,
                "brand_id" => 20,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Gamemax Gp Series Gp-650 650w 80+ Bronze White ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Deepcool Pf650 650w 80+ White",
                "price" => 212.0,
                "brand_id" => 15,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Deepcool Pf650 650w 80+ White ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Seasonic A12 600w 80+ White",
                "price" => 225.0,
                "brand_id" => 41,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Seasonic A12 600w 80+ White ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Gamemax Gp Series Gp-750 750w 80+ Bronze",
                "price" => 249.0,
                "brand_id" => 20,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Gamemax Gp Series Gp-750 750w 80+ Bronze ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" =>
                    "Fuente Gamemax Gp Series Gp-750 750w 80+ Bronze White",
                "price" => 249.0,
                "brand_id" => 20,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Gamemax Gp Series Gp-750 750w 80+ Bronze White ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Msi Mag A650bn 650w 80+ Bronze",
                "price" => 269.0,
                "brand_id" => 32,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Msi Mag A650bn 650w 80+ Bronze ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Msi Mag A750bn Pcie5 750w 80+ Bronze",
                "price" => 325.0,
                "brand_id" => 32,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Msi Mag A750bn Pcie5 750w 80+ Bronze ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Semi Modular Evga 600bq 600w 80+ Bronze",
                "price" => 349.0,
                "brand_id" => 18,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Semi Modular Evga 600bq 600w 80+ Bronze ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Gigabyte Ud850gm 850w 80+ Gold Full Modular",
                "price" => 490.0,
                "brand_id" => 22,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Gigabyte Ud850gm 850w 80+ Gold Full Modular ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Full Modular Evga Supernova G5 850w 80+ Gold",
                "price" => 740.0,
                "brand_id" => 18,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Full Modular Evga Supernova G5 850w 80+ Gold ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Gigabyte P450b 450w 80+ Bronze",
                "price" => 170.0,
                "brand_id" => 22,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Gigabyte P450b 450w 80+ Bronze ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Deepcool Pf500 500w 80+ White",
                "price" => 195.0,
                "brand_id" => 15,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Deepcool Pf500 500w 80+ White ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Gigabyte P550b 550w 80+ Bronze",
                "price" => 200.0,
                "brand_id" => 22,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Gigabyte P550b 550w 80+ Bronze ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Msi Mag A600dn 600w 80+ White",
                "price" => 215.0,
                "brand_id" => 32,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Msi Mag A600dn 600w 80+ White ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Deepcool Pf600 600w 80+ White",
                "price" => 220.0,
                "brand_id" => 15,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Deepcool Pf600 600w 80+ White ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Aerocool Cylon RGB 600w 80+ Bronze",
                "price" => 220.0,
                "brand_id" => 1,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Aerocool Cylon RGB 600w 80+ Bronze ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Semi Modular Antec Neoeco 650w 80+ Bronze",
                "price" => 250.0,
                "brand_id" => 3,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Semi Modular Antec Neoeco 650w 80+ Bronze ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Deepcool Pf700 700w 80+ White",
                "price" => 250.0,
                "brand_id" => 15,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Deepcool Pf700 700w 80+ White ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Fuente Gigabyte P650b 650w 80+ Bronze",
                "price" => 269.0,
                "brand_id" => 22,
                "category_id" => 8,
                "subcategory_id" => null,
                "description" =>
                    "La Fuente Gigabyte P650b 650w 80+ Bronze ofrece una energía confiable y eficiente para tu sistema."
            ],
            [
                "name" => "Pasta Termica Arctic Mx-4 4g (edicion 2022)",
                "price" => 48.0,
                "brand_id" => 6,
                "category_id" => 9,
                "subcategory_id" => null,
                "description" =>
                    "Optimiza la transferencia de calor en tu CPU con la Pasta Termica Arctic Mx-4 4g (edicion 2022)."
            ],
            [
                "name" => "Pasta Termica Deepcool Z10",
                "price" => 45.0,
                "brand_id" => 15,
                "category_id" => 9,
                "subcategory_id" => null,
                "description" =>
                    "Optimiza la transferencia de calor en tu CPU con la Pasta Termica Deepcool Z10."
            ],
            [
                "name" =>
                    "Almohadilla Termica Cooler Master Thermal Pad Pro 1.00mm",
                "price" => 55.0,
                "brand_id" => 12,
                "category_id" => 9,
                "subcategory_id" => null,
                "description" =>
                    "Disfruta del Almohadilla Termica Cooler Master Thermal Pad Pro 1.00mm, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Pasta Termica Cooler Master Cryofuze Nano",
                "price" => 55.0,
                "brand_id" => 12,
                "category_id" => 9,
                "subcategory_id" => null,
                "description" =>
                    "Optimiza la transferencia de calor en tu CPU con la Pasta Termica Cooler Master Cryofuze Nano."
            ],
            [
                "name" => "Pasta Termica Deepcool Ex750 5g",
                "price" => 59.0,
                "brand_id" => 15,
                "category_id" => 9,
                "subcategory_id" => null,
                "description" =>
                    "Optimiza la transferencia de calor en tu CPU con la Pasta Termica Deepcool Ex750 5g."
            ],
            [
                "name" => "Pasta Termica Arctic Mx-6 4g (edicion 2022)",
                "price" => 65.0,
                "brand_id" => 6,
                "category_id" => 9,
                "subcategory_id" => null,
                "description" =>
                    "Optimiza la transferencia de calor en tu CPU con la Pasta Termica Arctic Mx-6 4g (edicion 2022)."
            ],
            [
                "name" => "Pasta Termica Arctic Mx-4 8g (edicion 2022)",
                "price" => 68.0,
                "brand_id" => 6,
                "category_id" => 9,
                "subcategory_id" => null,
                "description" =>
                    "Optimiza la transferencia de calor en tu CPU con la Pasta Termica Arctic Mx-4 8g (edicion 2022)."
            ],
            [
                "name" => "Pasta Termica Deepcool Z5",
                "price" => 30.0,
                "brand_id" => 15,
                "category_id" => 9,
                "subcategory_id" => null,
                "description" =>
                    "Optimiza la transferencia de calor en tu CPU con la Pasta Termica Deepcool Z5."
            ],
            [
                "name" => "Pasta Termica Cooler Master Mastergel Pro",
                "price" => 58.0,
                "brand_id" => 12,
                "category_id" => 9,
                "subcategory_id" => null,
                "description" =>
                    "Optimiza la transferencia de calor en tu CPU con la Pasta Termica Cooler Master Mastergel Pro."
            ],
            [
                "name" => "Pasta Termica Cooler Master Mastergel Maker",
                "price" => 65.0,
                "brand_id" => 12,
                "category_id" => 9,
                "subcategory_id" => null,
                "description" =>
                    "Optimiza la transferencia de calor en tu CPU con la Pasta Termica Cooler Master Mastergel Maker."
            ],
            [
                "name" => "Pasta Termica Arctic Mx-4 45g (edicion 2022)",
                "price" => 240.0,
                "brand_id" => 6,
                "category_id" => 9,
                "subcategory_id" => null,
                "description" =>
                    "Optimiza la transferencia de calor en tu CPU con la Pasta Termica Arctic Mx-4 45g (edicion 2022)."
            ],
            [
                "name" => "Mouse Wireless Logitech M170 Black",
                "price" => 45.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Wireless Logitech M170 Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Antryx Chrome Storm M750 (dpi 4200)",
                "price" => 75.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Antryx Chrome Storm M750 (dpi 4200), diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Antryx M650",
                "price" => 79.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Antryx M650, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Redragon Griffin Black",
                "price" => 79.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Redragon Griffin Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Redragon Griffin White",
                "price" => 89.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Redragon Griffin White, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Vsg Aurora Púrpura Austral",
                "price" => 99.0,
                "brand_id" => 47,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Vsg Aurora Púrpura Austral, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Vsg Aurora Verde Boreal",
                "price" => 99.0,
                "brand_id" => 47,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Vsg Aurora Verde Boreal, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Redragon Cobra White",
                "price" => 109.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Redragon Cobra White, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Corsair Katar Pro Ultra Light",
                "price" => 109.0,
                "brand_id" => 13,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Corsair Katar Pro Ultra Light, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Razer Deathadder Essential Black",
                "price" => 115.0,
                "brand_id" => 37,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Razer Deathadder Essential Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Logitech G203 Lightsync Black RGB",
                "price" => 122.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Logitech G203 Lightsync Black RGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Logitech G203 Lightsync White RGB",
                "price" => 122.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Logitech G203 Lightsync White RGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Logitech G203 Lightsync Lila RGB",
                "price" => 122.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Logitech G203 Lightsync Lila RGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Logitech G203 Lightsync Blue RGB",
                "price" => 122.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Logitech G203 Lightsync Blue RGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Wireless Antryx Chrome Storm Scorpio Ii",
                "price" => 125.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Wireless Antryx Chrome Storm Scorpio Ii, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Vsg Aquila",
                "price" => 125.0,
                "brand_id" => 47,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Vsg Aquila, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Deepcool Mc310 Ultralight Gaming Mouse",
                "price" => 130.0,
                "brand_id" => 15,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Deepcool Mc310 Ultralight Gaming Mouse, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Logitech Mx518 Legendary Hero",
                "price" => 139.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Logitech Mx518 Legendary Hero, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Redragon Cobra Fps",
                "price" => 155.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Redragon Cobra Fps, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mouse Wireless Logitech G305 Hero Lightspeed Black",
                "price" => 159.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 17,
                "description" =>
                    "Disfruta del Mouse Wireless Logitech G305 Hero Lightspeed Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado T-dagger Arena Black Rainbow - Brown Switch",
                "price" => 129.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado T-dagger Arena Black Rainbow - Brown Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado T-dagger Arena White Rainbow - Brown Switch",
                "price" => 129.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado T-dagger Arena White Rainbow - Brown Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado Bluetooth Logitech K380 Multidevice Black",
                "price" => 142.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado Bluetooth Logitech K380 Multidevice Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado Bluetooth Logitech K380 Multidevice White",
                "price" => 142.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado Bluetooth Logitech K380 Multidevice White, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado T-dagger Bora Black Rainbow Blue Switch",
                "price" => 149.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado T-dagger Bora Black Rainbow Blue Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Teclado T-dagger Arena White/green Rainbow - Brown Switch",
                "price" => 139.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado T-dagger Arena White/green Rainbow - Brown Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado T-dagger Bora White Rainbow - Red Switch",
                "price" => 149.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado T-dagger Bora White Rainbow - Red Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado Redragon Kumara Black Rainbow - Red Switch",
                "price" => 169.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado Redragon Kumara Black Rainbow - Red Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado Redragon Kumara White Rainbow - Red Switch",
                "price" => 169.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado Redragon Kumara White Rainbow - Red Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado Vsg Quasar Black RGB - Red Switch",
                "price" => 179.0,
                "brand_id" => 47,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado Vsg Quasar Black RGB - Red Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado T-dagger Bora Black RGB Blue Switch",
                "price" => 179.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado T-dagger Bora Black RGB Blue Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado T-dagger Bora White RGB - Blue Switch",
                "price" => 179.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado T-dagger Bora White RGB - Blue Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado T-dagger Naxos Rainbow Blue Switch",
                "price" => 189.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado T-dagger Naxos Rainbow Blue Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado T-dagger Naxos Rainbow Red Switch",
                "price" => 189.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado T-dagger Naxos Rainbow Red Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado T-dagger Bora Black RGB - Red Switch",
                "price" => 179.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado T-dagger Bora Black RGB - Red Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado T-dagger Bora White RGB - Red Switch",
                "price" => 179.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado T-dagger Bora White RGB - Red Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado Antryx Mk830 RGB - Blue Switch",
                "price" => 199.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado Antryx Mk830 RGB - Blue Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado Antryx Mk830 RGB - Brown Switch",
                "price" => 199.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado Antryx Mk830 RGB - Brown Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado Antryx Mk830 RGB - Red Switch",
                "price" => 199.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado Antryx Mk830 RGB - Red Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Teclado Redragon Dragonborn Black - Brown Switch",
                "price" => 199.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 18,
                "description" =>
                    "Disfruta del Teclado Redragon Dragonborn Black - Brown Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono Teros Gaming Te-8171n Estereo RGB",
                "price" => 49.0,
                "brand_id" => 45,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Teros Gaming Te-8171n Estereo RGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono Xblade Banshee",
                "price" => 59.0,
                "brand_id" => 49,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Xblade Banshee, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono Redragon Hylas Black",
                "price" => 79.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Redragon Hylas Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono Redragon Hylas Pink",
                "price" => 79.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Redragon Hylas Pink, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono Primus Gaming Arcus 90t In-ear 3.5mm",
                "price" => 79.0,
                "brand_id" => 36,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Primus Gaming Arcus 90t In-ear 3.5mm, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono Xblade Orcus",
                "price" => 85.0,
                "brand_id" => 49,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Xblade Orcus, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono Redragon Hylas White",
                "price" => 79.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Redragon Hylas White, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono Antryx Chrome Storm Gh-530",
                "price" => 95.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Antryx Chrome Storm Gh-530, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono T-dagger Sona 7.1 Black",
                "price" => 109.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono T-dagger Sona 7.1 Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono Havit Tw-952 Pro Gamer RGB Negro Tws",
                "price" => 109.0,
                "brand_id" => 55,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Havit Tw-952 Pro Gamer RGB Negro Tws, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono Vsg Gemini White",
                "price" => 115.0,
                "brand_id" => 47,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Vsg Gemini White, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono T-dagger Sona 7.1 White",
                "price" => 115.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono T-dagger Sona 7.1 White, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono T-dagger Sona 7.1 Pink",
                "price" => 115.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono T-dagger Sona 7.1 Pink, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Audifono Primus Gaming Arcus 200s-bt Tws Earbuds Bluetooth Usb-c",
                "price" => 125.0,
                "brand_id" => 36,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Primus Gaming Arcus 200s-bt Tws Earbuds Bluetooth Usb-c, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono Vsg Shake 7.1",
                "price" => 129.0,
                "brand_id" => 47,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Vsg Shake 7.1, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono Wireless T-dagger Geneve 7.1 Pc/ps4",
                "price" => 139.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Wireless T-dagger Geneve 7.1 Pc/ps4, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono Redragon Pandora RGB 7.1",
                "price" => 149.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Redragon Pandora RGB 7.1, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Audifono Primus Gaming Mandalorian Arcus 210s-bt Tws Earbuds Bluetooth Usb-c",
                "price" => 150.0,
                "brand_id" => 36,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Primus Gaming Mandalorian Arcus 210s-bt Tws Earbuds Bluetooth Usb-c, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Audifono Razer Blackshark V2 X Multiplatform 7.1",
                "price" => 155.0,
                "brand_id" => 37,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Razer Blackshark V2 X Multiplatform 7.1, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Audifono Fifine Ampligame H9 Black Sonido 7.1 Pc/consola",
                "price" => 165.0,
                "brand_id" => 19,
                "category_id" => 10,
                "subcategory_id" => 19,
                "description" =>
                    "Disfruta del Audifono Fifine Ampligame H9 Black Sonido 7.1 Pc/consola, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Redragon Flick M",
                "price" => 35.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Redragon Flick M, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Redragon Flick L",
                "price" => 55.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Redragon Flick L, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Antryx Accura 80a Xl",
                "price" => 59.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Antryx Accura 80a Xl, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Deepcool Gm810",
                "price" => 62.0,
                "brand_id" => 15,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Deepcool Gm810, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Logitech Deskpad Light Grey",
                "price" => 72.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Logitech Deskpad Light Grey, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Logitech G440 Hard Medium Black",
                "price" => 75.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Logitech G440 Hard Medium Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Genius Gx 800s RGB Black",
                "price" => 80.0,
                "brand_id" => 21,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Genius Gx 800s RGB Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Redragon Flick Xl",
                "price" => 85.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Redragon Flick Xl, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Deepcool Gm820",
                "price" => 89.0,
                "brand_id" => 15,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Deepcool Gm820, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Primus Gaming Mandalorian Arena Xxl",
                "price" => 92.0,
                "brand_id" => 36,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Primus Gaming Mandalorian Arena Xxl, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Logitech G640 Cloth Large Black",
                "price" => 95.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Logitech G640 Cloth Large Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Hyperx Fury S Speed Edition (xl)",
                "price" => 99.0,
                "brand_id" => 24,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Hyperx Fury S Speed Edition (xl), diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Antryx Accura 80 RGB",
                "price" => 119.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Antryx Accura 80 RGB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Razer Gigantus V2 Soft Xxl Black",
                "price" => 120.0,
                "brand_id" => 37,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Razer Gigantus V2 Soft Xxl Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Logitech G840 Cloth Xl Black",
                "price" => 149.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Logitech G840 Cloth Xl Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Logitech G840 Cloth Xl Kda",
                "price" => 149.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Logitech G840 Cloth Xl Kda, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Logitech G840 Cloth Xl Lol 2 Edition",
                "price" => 149.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Logitech G840 Cloth Xl Lol 2 Edition, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Razer Gigantus V2 Soft 3xl Black",
                "price" => 190.0,
                "brand_id" => 37,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Razer Gigantus V2 Soft 3xl Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Vsg Armagedon",
                "price" => 32.0,
                "brand_id" => 47,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Vsg Armagedon, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mousepad Hyperx Fury S Speed Edition (m)",
                "price" => 48.0,
                "brand_id" => 24,
                "category_id" => 10,
                "subcategory_id" => 20,
                "description" =>
                    "Disfruta del Mousepad Hyperx Fury S Speed Edition (m), diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Microfono Pedestal Halion Tm-4",
                "price" => 35.0,
                "brand_id" => 33,
                "category_id" => 10,
                "subcategory_id" => 21,
                "description" =>
                    "Disfruta del Microfono Pedestal Halion Tm-4, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Microfono Solapero K9 USB Type-c Wireless *2",
                "price" => 79.0,
                "brand_id" => 54,
                "category_id" => 10,
                "subcategory_id" => 21,
                "description" =>
                    "Disfruta del Microfono Solapero K9 USB Type-c Wireless *2, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Microfono Razer Seiren Mini USB Black",
                "price" => 205.0,
                "brand_id" => 37,
                "category_id" => 10,
                "subcategory_id" => 21,
                "description" =>
                    "Disfruta del Microfono Razer Seiren Mini USB Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Microfono Razer Seiren Mini USB Mercury",
                "price" => 205.0,
                "brand_id" => 37,
                "category_id" => 10,
                "subcategory_id" => 21,
                "description" =>
                    "Disfruta del Microfono Razer Seiren Mini USB Mercury, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Microfono Razer Seiren Mini USB Quartz",
                "price" => 205.0,
                "brand_id" => 37,
                "category_id" => 10,
                "subcategory_id" => 21,
                "description" =>
                    "Disfruta del Microfono Razer Seiren Mini USB Quartz, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Microfono Blue Snowball Ice USB Cardioide Black",
                "price" => 209.0,
                "brand_id" => 9,
                "category_id" => 10,
                "subcategory_id" => 21,
                "description" =>
                    "Disfruta del Microfono Blue Snowball Ice USB Cardioide Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Microfono Blue Snowball Ice USB Cardioide White",
                "price" => 209.0,
                "brand_id" => 9,
                "category_id" => 10,
                "subcategory_id" => 21,
                "description" =>
                    "Disfruta del Microfono Blue Snowball Ice USB Cardioide White, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Microfono Hyperx Solocast",
                "price" => 209.0,
                "brand_id" => 24,
                "category_id" => 10,
                "subcategory_id" => 21,
                "description" =>
                    "Disfruta del Microfono Hyperx Solocast, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Microfono Blue Yeti Nano USB Streaming Cardioide",
                "price" => 375.0,
                "brand_id" => 9,
                "category_id" => 10,
                "subcategory_id" => 21,
                "description" =>
                    "Disfruta del Microfono Blue Yeti Nano USB Streaming Cardioide, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Microfono Hyperx Quadcast",
                "price" => 449.0,
                "brand_id" => 24,
                "category_id" => 10,
                "subcategory_id" => 21,
                "description" =>
                    "Disfruta del Microfono Hyperx Quadcast, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Microfono Streamplify Mic Arm - Micro + Brazo + Filtro Anti Pop",
                "price" => 259.0,
                "brand_id" => 42,
                "category_id" => 10,
                "subcategory_id" => 21,
                "description" =>
                    "Disfruta del Microfono Streamplify Mic Arm - Micro + Brazo + Filtro Anti Pop, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Microfono Redragon Blazar",
                "price" => 275.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 21,
                "description" =>
                    "Disfruta del Microfono Redragon Blazar, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Microfono Blue Yeti Blackout USB Streaming Cardioide",
                "price" => 425.0,
                "brand_id" => 9,
                "category_id" => 10,
                "subcategory_id" => 21,
                "description" =>
                    "Disfruta del Microfono Blue Yeti Blackout USB Streaming Cardioide, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Parlantes Genius Sp-hf180 6w USB Black",
                "price" => 49.0,
                "brand_id" => 21,
                "category_id" => 10,
                "subcategory_id" => 22,
                "description" =>
                    "Disfruta del Parlantes Genius Sp-hf180 6w USB Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Parlantes Genius Sound Bar 100 Mini 6w USB Black",
                "price" => 55.0,
                "brand_id" => 21,
                "category_id" => 10,
                "subcategory_id" => 22,
                "description" =>
                    "Disfruta del Parlantes Genius Sound Bar 100 Mini 6w USB Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Parlantes Redragon Darknets",
                "price" => 129.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 22,
                "description" =>
                    "Disfruta del Parlantes Redragon Darknets, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Parlantes Creative Pebble Plus 2.1 USB Black",
                "price" => 169.0,
                "brand_id" => 14,
                "category_id" => 10,
                "subcategory_id" => 22,
                "description" =>
                    "Disfruta del Parlantes Creative Pebble Plus 2.1 USB Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Parlantes Fifine A16 Black",
                "price" => 179.0,
                "brand_id" => 19,
                "category_id" => 10,
                "subcategory_id" => 22,
                "description" =>
                    "Disfruta del Parlantes Fifine A16 Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Parlantes Logitech Z313 2.1 25w 220v Black",
                "price" => 219.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 22,
                "description" =>
                    "Disfruta del Parlantes Logitech Z313 2.1 25w 220v Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Parlantes Genius Sw-g2.1 1200 36w Blue Light Black",
                "price" => 255.0,
                "brand_id" => 21,
                "category_id" => 10,
                "subcategory_id" => 22,
                "description" =>
                    "Disfruta del Parlantes Genius Sw-g2.1 1200 36w Blue Light Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Parlantes Creative E2900 2.1 60w Bt/fm/usb/sd/3.5mm Black",
                "price" => 275.0,
                "brand_id" => 14,
                "category_id" => 10,
                "subcategory_id" => 22,
                "description" =>
                    "Disfruta del Parlantes Creative E2900 2.1 60w Bt/fm/usb/sd/3.5mm Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Parlantes Logitech Z407 2.1 80w Bluetooth Black",
                "price" => 379.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 22,
                "description" =>
                    "Disfruta del Parlantes Logitech Z407 2.1 80w Bluetooth Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Parlantes Genius Sw-2.1 300x 10w Black",
                "price" => 89.0,
                "brand_id" => 21,
                "category_id" => 10,
                "subcategory_id" => 22,
                "description" =>
                    "Disfruta del Parlantes Genius Sw-2.1 300x 10w Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Parlantes Genius Sw-2.1 350 15w Black",
                "price" => 152.0,
                "brand_id" => 21,
                "category_id" => 10,
                "subcategory_id" => 22,
                "description" =>
                    "Disfruta del Parlantes Genius Sw-2.1 350 15w Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Parlantes Logitech Z337 2.1 40w Bluetooth Black",
                "price" => 225.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 22,
                "description" =>
                    "Disfruta del Parlantes Logitech Z337 2.1 40w Bluetooth Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Parlantes Genius Sw-g2.1 1000 26w Blue Light Black",
                "price" => 225.0,
                "brand_id" => 21,
                "category_id" => 10,
                "subcategory_id" => 22,
                "description" =>
                    "Disfruta del Parlantes Genius Sw-g2.1 1000 26w Blue Light Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Parlantes Logitech Z607 5.1 160w Bluetooth Black",
                "price" => 390.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 22,
                "description" =>
                    "Disfruta del Parlantes Logitech Z607 5.1 160w Bluetooth Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mando Inalambrico Logitech F710",
                "price" => 170.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 23,
                "description" =>
                    "Disfruta del Mando Inalambrico Logitech F710, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Mando Inalambrico Microsoft Xbox Shock Blue (color Azul)",
                "price" => 239.0,
                "brand_id" => 31,
                "category_id" => 10,
                "subcategory_id" => 23,
                "description" =>
                    "Disfruta del Mando Inalambrico Microsoft Xbox Shock Blue (color Azul), diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Mando Inalambrico Microsoft Xbox Robot White (color Blanco)",
                "price" => 239.0,
                "brand_id" => 31,
                "category_id" => 10,
                "subcategory_id" => 23,
                "description" =>
                    "Disfruta del Mando Inalambrico Microsoft Xbox Robot White (color Blanco), diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Mando Inalambrico Microsoft Xbox Pulse Red (color Rojo)",
                "price" => 239.0,
                "brand_id" => 31,
                "category_id" => 10,
                "subcategory_id" => 23,
                "description" =>
                    "Disfruta del Mando Inalambrico Microsoft Xbox Pulse Red (color Rojo), diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mando Inalambrico Microsoft Xbox + Cable Usb-c",
                "price" => 245.0,
                "brand_id" => 31,
                "category_id" => 10,
                "subcategory_id" => 23,
                "description" =>
                    "Disfruta del Mando Inalambrico Microsoft Xbox + Cable Usb-c, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Timon C/pedal Logitech G29 Racing Wheelps3/ps4/ps5/pc USB",
                "price" => 1050.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 23,
                "description" =>
                    "Disfruta del Timon C/pedal Logitech G29 Racing Wheelps3/ps4/ps5/pc USB, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mando Inalambrico T-dagger Scorpio Black",
                "price" => 145.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 23,
                "description" =>
                    "Disfruta del Mando Inalambrico T-dagger Scorpio Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mando Inalambrico T-dagger Scorpio White",
                "price" => 145.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 23,
                "description" =>
                    "Disfruta del Mando Inalambrico T-dagger Scorpio White, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Mando Inalambrico Msi Force Gc30 V2 White",
                "price" => 179.0,
                "brand_id" => 32,
                "category_id" => 10,
                "subcategory_id" => 23,
                "description" =>
                    "Disfruta del Mando Inalambrico Msi Force Gc30 V2 White, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Mando Inalambrico Microsoft Xbox Electric Volt (color Verde Claro)",
                "price" => 239.0,
                "brand_id" => 31,
                "category_id" => 10,
                "subcategory_id" => 23,
                "description" =>
                    "Disfruta del Mando Inalambrico Microsoft Xbox Electric Volt (color Verde Claro), diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Palanca De Cambios Logitech Driving Force Shifter P/ G29 & G920 6 Velocidades",
                "price" => 249.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 23,
                "description" =>
                    "Disfruta del Palanca De Cambios Logitech Driving Force Shifter P/ G29 & G920 6 Velocidades, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Webcam Logitech C270 HD 720p",
                "price" => 115.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 24,
                "description" =>
                    "Disfruta del Webcam Logitech C270 HD 720p, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Webcam Redragon Fobos 720p Gw600",
                "price" => 149.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 24,
                "description" =>
                    "Disfruta del Webcam Redragon Fobos 720p Gw600, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Webcam Redragon Hitman 1080p Gw800",
                "price" => 209.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 24,
                "description" =>
                    "Disfruta del Webcam Redragon Hitman 1080p Gw800, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Webcam Logitech C922 Pro Stream Fhd 1080p Black",
                "price" => 315.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 24,
                "description" =>
                    "Disfruta del Webcam Logitech C922 Pro Stream Fhd 1080p Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Webcam Logitech Streamcam Plus Full HD 60fps Black",
                "price" => 495.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 24,
                "description" =>
                    "Disfruta del Webcam Logitech Streamcam Plus Full HD 60fps Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Webcam Genius Facecam 1000x USB Black",
                "price" => 89.0,
                "brand_id" => 21,
                "category_id" => 10,
                "subcategory_id" => 24,
                "description" =>
                    "Disfruta del Webcam Genius Facecam 1000x USB Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Webcam Genius Ecam 8000 Fhd 1080p USB Black",
                "price" => 150.0,
                "brand_id" => 21,
                "category_id" => 10,
                "subcategory_id" => 24,
                "description" =>
                    "Disfruta del Webcam Genius Ecam 8000 Fhd 1080p USB Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Webcam Streamplify Cam 1080p 60fps",
                "price" => 249.0,
                "brand_id" => 42,
                "category_id" => 10,
                "subcategory_id" => 24,
                "description" =>
                    "Disfruta del Webcam Streamplify Cam 1080p 60fps, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Webcam Logitech B2b C930e Black",
                "price" => 305.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 24,
                "description" =>
                    "Disfruta del Webcam Logitech B2b C930e Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Webcam Logitech B2b Brio Ultra HD 4K Black",
                "price" => 580.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 24,
                "description" =>
                    "Disfruta del Webcam Logitech B2b Brio Ultra HD 4K Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Pack Logitech Teclado + Mouse Mk120 USB Black",
                "price" => 55.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Pack Logitech Teclado + Mouse Mk120 USB Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Pack Logitech Teclado + Mouse Wireless Mk220 Black",
                "price" => 85.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Pack Logitech Teclado + Mouse Wireless Mk220 Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Pack Halion Mack Ha-875c RGB 4 En 1",
                "price" => 130.0,
                "brand_id" => 33,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Pack Halion Mack Ha-875c RGB 4 En 1, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Pack Antryx Teclado + Mouse Chrome Storm Gc1200",
                "price" => 139.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Pack Antryx Teclado + Mouse Chrome Storm Gc1200, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Pack Teclado+mouse T-dagger Advance Force Tgk313+tgm206 Black - Red Switch",
                "price" => 179.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Pack Teclado+mouse T-dagger Advance Force Tgk313+tgm206 Black - Red Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Pack Teclado+mouse T-dagger Advance Force Tgk313+tgm206 White - Red Switch",
                "price" => 179.0,
                "brand_id" => 43,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Pack Teclado+mouse T-dagger Advance Force Tgk313+tgm206 White - Red Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Kit Gaming Antryx Gc-5100 Black (teclado Mecanico + Mouse) - Purple Switch",
                "price" => 199.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Kit Gaming Antryx Gc-5100 Black (teclado Mecanico + Mouse) - Purple Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Kit Gaming Antryx Gc-5100 Black (teclado Mecanico + Mouse) - Blue Switch",
                "price" => 204.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Kit Gaming Antryx Gc-5100 Black (teclado Mecanico + Mouse) - Blue Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Kit Gaming Antryx Gc-5100 Black (teclado Mecanico + Mouse) - Red Switch",
                "price" => 204.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Kit Gaming Antryx Gc-5100 Black (teclado Mecanico + Mouse) - Red Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Kit Gaming Antryx Gc-5100 White (teclado Mecanico + Mouse) - Red Switch",
                "price" => 209.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Kit Gaming Antryx Gc-5100 White (teclado Mecanico + Mouse) - Red Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Kit Gaming Antryx Gc-5100 White (teclado Mecanico + Mouse) - Blue Switch",
                "price" => 209.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Kit Gaming Antryx Gc-5100 White (teclado Mecanico + Mouse) - Blue Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Pack Redragon 2 En 1 Kumara + Griffin - Spanish",
                "price" => 259.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Pack Redragon 2 En 1 Kumara + Griffin - Spanish, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Pack Xblade 4 En 1 Reaper V2",
                "price" => 135.0,
                "brand_id" => 49,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Pack Xblade 4 En 1 Reaper V2, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Pack Vsg Crux 4 En 1",
                "price" => 179.0,
                "brand_id" => 47,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Pack Vsg Crux 4 En 1, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Kit Gaming Antryx Gc-5400 Pink (teclado Mecanico + Mouse) - Red Switch",
                "price" => 230.0,
                "brand_id" => 4,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Kit Gaming Antryx Gc-5400 Pink (teclado Mecanico + Mouse) - Red Switch, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Pack Redragon 2 En 1 Mitra + Griffin - Spanish",
                "price" => 269.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Pack Redragon 2 En 1 Mitra + Griffin - Spanish, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Pack Redragon 2 En 1 Kumara + Griffin White - Spanish",
                "price" => 279.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Pack Redragon 2 En 1 Kumara + Griffin White - Spanish, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Pack Logitech Audifono + Mouse - G435 + G305 Black/white/green",
                "price" => 385.0,
                "brand_id" => 30,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Pack Logitech Audifono + Mouse - G435 + G305 Black/white/green, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Pack Razer Battle Bundle (deathadder V2 + Blacksahrk V2 X Gigantus M)",
                "price" => 390.0,
                "brand_id" => 37,
                "category_id" => 10,
                "subcategory_id" => 25,
                "description" =>
                    "Disfruta del Pack Razer Battle Bundle (deathadder V2 + Blacksahrk V2 X Gigantus M), diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Kit Switch Redragon Outemo Red",
                "price" => 35.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 26,
                "description" =>
                    "Disfruta del Kit Switch Redragon Outemo Red, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Kit Switch Redragon Outemo Blue",
                "price" => 35.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 26,
                "description" =>
                    "Disfruta del Kit Switch Redragon Outemo Blue, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Keycaps Redragon Black Round",
                "price" => 50.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 26,
                "description" =>
                    "Disfruta del Keycaps Redragon Black Round, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Keycaps Redragon Black Crystal",
                "price" => 59.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 26,
                "description" =>
                    "Disfruta del Keycaps Redragon Black Crystal, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Kit Switch Redragon A113 Bullet Ql",
                "price" => 65.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 26,
                "description" =>
                    "Disfruta del Kit Switch Redragon A113 Bullet Ql, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Kit Switch Redragon A113 Bullet Qt",
                "price" => 65.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 26,
                "description" =>
                    "Disfruta del Kit Switch Redragon A113 Bullet Qt, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Keycaps Redragon Scarab Black",
                "price" => 69.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 26,
                "description" =>
                    "Disfruta del Keycaps Redragon Scarab Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Keycaps Redragon Scarab Pink",
                "price" => 69.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 26,
                "description" =>
                    "Disfruta del Keycaps Redragon Scarab Pink, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Keycaps Redragon Scarab White",
                "price" => 69.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 26,
                "description" =>
                    "Disfruta del Keycaps Redragon Scarab White, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Kit Switch Redragon Outemo Brown",
                "price" => 35.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 26,
                "description" =>
                    "Disfruta del Kit Switch Redragon Outemo Brown, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Keycaps Redragon Scarab Black - Ingles",
                "price" => 65.0,
                "brand_id" => 38,
                "category_id" => 10,
                "subcategory_id" => 26,
                "description" =>
                    "Disfruta del Keycaps Redragon Scarab Black - Ingles, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => 'Monitor Lg 22mn430m-b 21.5\'\' Fhd Ips 75hz 5ms',
                "price" => 285.0,
                "brand_id" => 28,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Lg 22mn430m-b 21.5\'\' Fhd Ips 75hz 5ms.'
            ],
            [
                "name" => 'Monitor Lg 24mq400-b 24\'\' Fhd Ips 75hz 5ms',
                "price" => 360.0,
                "brand_id" => 28,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Lg 24mq400-b 24\'\' Fhd Ips 75hz 5ms.'
            ],
            [
                "name" =>
                    'Monitor Teros 24\'\' Curvo Ips Te-2470g Fhd 165hz 1ms',
                "price" => 465.0,
                "brand_id" => 45,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Teros 24\'\' Curvo Ips Te-2470g Fhd 165hz 1ms.'
            ],
            [
                "name" => 'Monitor Msi G2422c 24\'\' Curvo Va Fhd 1ms 180hz',
                "price" => 589.0,
                "brand_id" => 32,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Msi G2422c 24\'\' Curvo Va Fhd 1ms 180hz.'
            ],
            [
                "name" => 'Monitor Msi G244f 24\'\' Plano Ips Fhd 1ms 170hz',
                "price" => 600.0,
                "brand_id" => 32,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Msi G244f 24\'\' Plano Ips Fhd 1ms 170hz.'
            ],
            [
                "name" =>
                    'Monitor Samsung Odyssey G3 24\'\' Fhd 165hz Ls24ag320nlxpe',
                "price" => 629.0,
                "brand_id" => 39,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Samsung Odyssey G3 24\'\' Fhd 165hz Ls24ag320nlxpe.'
            ],
            [
                "name" =>
                    'Monitor Teros 27" Te-3194n Va Fhd 165hz Curvo Soporte Ajustable',
                "price" => 639.0,
                "brand_id" => 45,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Teros 27" Te-3194n Va Fhd 165hz Curvo Soporte Ajustable.'
            ],
            [
                "name" => 'Monitor Teros 25" Plano Va Te-2410g Fhd 240hz 1ms',
                "price" => 695.0,
                "brand_id" => 45,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Teros 25" Plano Va Te-2410g Fhd 240hz 1ms.'
            ],
            [
                "name" =>
                    'Monitor Teros 27" Curvo Va Te-2765g Qhd 165hz 1ms - Base Ajustable',
                "price" => 799.0,
                "brand_id" => 45,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Teros 27" Curvo Va Te-2765g Qhd 165hz 1ms - Base Ajustable.'
            ],
            [
                "name" => 'Monitor Gigabyte 27\'\' Fhd C27fc 165hz 1ms',
                "price" => 819.0,
                "brand_id" => 22,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Gigabyte 27\'\' Fhd C27fc 165hz 1ms.'
            ],
            [
                "name" =>
                    'Monitor Lg 24\'\' Ultragear Tn Fhd 144hz 1ms 24gl600f',
                "price" => 869.0,
                "brand_id" => 28,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Lg 24\'\' Ultragear Tn Fhd 144hz 1ms 24gl600f.'
            ],
            [
                "name" =>
                    'Monitor Teros 32" Curvo Va Te-3214g 2k Qhd 165hz 1ms',
                "price" => 969.0,
                "brand_id" => 45,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Teros 32" Curvo Va Te-3214g 2k Qhd 165hz 1ms.'
            ],
            [
                "name" =>
                    'Monitor Benq Zowie Xl2411p 24\' Fhd Curvo 144hz 1ms (base Ajustable)',
                "price" => 985.0,
                "brand_id" => 53,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Benq Zowie Xl2411p 24\' Fhd Curvo 144hz 1ms (base Ajustable).'
            ],
            [
                "name" =>
                    'Monitor Teros 34" Curvo Te-3410g Uwqhd 165hz, 3440x1440, Base Ajustable',
                "price" => 1229.0,
                "brand_id" => 45,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Teros 34" Curvo Te-3410g Uwqhd 165hz, 3440x1440, Base Ajustable.'
            ],
            [
                "name" => 'Monitor Teros 22" Te-2121s Ips Fhd 100hz 1ms',
                "price" => 299.0,
                "brand_id" => 45,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Teros 22" Te-2121s Ips Fhd 100hz 1ms.'
            ],
            [
                "name" => 'Monitor Teros 24" Te-2412s Ips Fhd 100hz 1ms',
                "price" => 349.0,
                "brand_id" => 45,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Teros 24" Te-2412s Ips Fhd 100hz 1ms.'
            ],
            [
                "name" =>
                    'Monitor Samsung 24\'\' Curvo Fhd 75hz Amd Freesync Ls24c360ealxpe',
                "price" => 399.0,
                "brand_id" => 39,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Samsung 24\'\' Curvo Fhd 75hz Amd Freesync Ls24c360ealxpe.'
            ],
            [
                "name" => 'Monitor Msi G2412 24\'\' Ips Fhd 1ms 170hz',
                "price" => 689.0,
                "brand_id" => 32,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Msi G2412 24\'\' Ips Fhd 1ms 170hz.'
            ],
            [
                "name" =>
                    'Monitor Asus Tuf Gaming 23.8\'\' Curvo Fhd Vg24vq1b 165hz 1ms',
                "price" => 699.0,
                "brand_id" => 8,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Asus Tuf Gaming 23.8\'\' Curvo Fhd Vg24vq1b 165hz 1ms.'
            ],
            [
                "name" =>
                    'Monitor Lg Ultragear 24gn65r-b 24\'\' Fhd Ips 144hz 1ms',
                "price" => 729.0,
                "brand_id" => 28,
                "category_id" => 11,
                "subcategory_id" => null,
                "description" =>
                    'Disfruta de una calidad de imagen superior con el Monitor Lg Ultragear 24gn65r-b 24\'\' Fhd Ips 144hz 1ms.'
            ],
            [
                "name" => "Silla Gaming Antryx Xtreme Racing Nova Blue",
                "price" => 569.0,
                "brand_id" => 4,
                "category_id" => 12,
                "subcategory_id" => null,
                "description" =>
                    "Disfruta del Silla Gaming Antryx Xtreme Racing Nova Blue, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Gaming Desk Thunderx3 Ed5",
                "price" => 589.0,
                "brand_id" => 54,
                "category_id" => 12,
                "subcategory_id" => null,
                "description" =>
                    "Disfruta del Gaming Desk Thunderx3 Ed5, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Silla Gaming Antryx Xtreme Racing Nova Black",
                "price" => 569.0,
                "brand_id" => 4,
                "category_id" => 12,
                "subcategory_id" => null,
                "description" =>
                    "Disfruta del Silla Gaming Antryx Xtreme Racing Nova Black, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Silla Gaming Antryx Xtreme Racing Nova Red",
                "price" => 569.0,
                "brand_id" => 4,
                "category_id" => 12,
                "subcategory_id" => null,
                "description" =>
                    "Disfruta del Silla Gaming Antryx Xtreme Racing Nova Red, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Silla Gaming Halion Ha-s47 Negro/verde",
                "price" => 629.0,
                "brand_id" => 33,
                "category_id" => 12,
                "subcategory_id" => null,
                "description" =>
                    "Disfruta del Silla Gaming Halion Ha-s47 Negro/verde, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Silla Gaming Halion Ha-s47 Negro/rojo",
                "price" => 629.0,
                "brand_id" => 33,
                "category_id" => 12,
                "subcategory_id" => null,
                "description" =>
                    "Disfruta del Silla Gaming Halion Ha-s47 Negro/rojo, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" =>
                    "Estabilizador Cdp Ru-avr604i 600va/300w 4 Salidas 4 Puertos USB",
                "price" => 69.0,
                "brand_id" => 11,
                "category_id" => 13,
                "subcategory_id" => null,
                "description" =>
                    "Protege tus dispositivos electrónicos con el Estabilizador Cdp Ru-avr604i 600va/300w 4 Salidas 4 Puertos USB, tu aliado contra las fluctuaciones de energía."
            ],
            [
                "name" =>
                    "Estabilizador Cdp R2cu-avr1008i 1000va/500w 8 Salidas 4 Puertos USB",
                "price" => 89.0,
                "brand_id" => 11,
                "category_id" => 13,
                "subcategory_id" => null,
                "description" =>
                    "Protege tus dispositivos electrónicos con el Estabilizador Cdp R2cu-avr1008i 1000va/500w 8 Salidas 4 Puertos USB, tu aliado contra las fluctuaciones de energía."
            ],
            [
                "name" =>
                    "Estabilizador Solido Elise Fase Fxe-10 1.0kva 4 Tomas + 1 By-pass",
                "price" => 145.0,
                "brand_id" => 16,
                "category_id" => 13,
                "subcategory_id" => null,
                "description" =>
                    "Protege tus dispositivos electrónicos con el Estabilizador Solido Elise Fase Fxe-10 1.0kva 4 Tomas + 1 By-pass, tu aliado contra las fluctuaciones de energía."
            ],
            [
                "name" => "Ups Cdp R-upr758i 750va/375w Autonomia 20 Min",
                "price" => 192.0,
                "brand_id" => 11,
                "category_id" => 13,
                "subcategory_id" => null,
                "description" =>
                    "Disfruta del Ups Cdp R-upr758i 750va/375w Autonomia 20 Min, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Ups Cdp R-upr1008i 1000va/500w Autonomia 40 Min",
                "price" => 235.0,
                "brand_id" => 11,
                "category_id" => 13,
                "subcategory_id" => null,
                "description" =>
                    "Disfruta del Ups Cdp R-upr1008i 1000va/500w Autonomia 40 Min, diseñado para ofrecer calidad y rendimiento excepcionales."
            ],
            [
                "name" => "Estabilizador Cdp R-avr1808i 1800va/1000w 8 Salidas",
                "price" => 109.0,
                "brand_id" => 11,
                "category_id" => 13,
                "subcategory_id" => null,
                "description" =>
                    "Protege tus dispositivos electrónicos con el Estabilizador Cdp R-avr1808i 1800va/1000w 8 Salidas, tu aliado contra las fluctuaciones de energía."
            ]
        ];

        foreach ($products as $key => $product) {
            $slug = Str::slug($product["name"]);
            $product["slug"] = $slug;
            $product["image"] = Storage::exists("products/" . $slug . ".png")
                ? $slug . ".png"
                : "no-image";

            $product["discount"] = mt_rand(0, 50) / 100;
            $product["stock"] = mt_rand(0, 50);

            $products[$key] = $product;
        }

        DB::table("products")->insert($products);
    }
}
