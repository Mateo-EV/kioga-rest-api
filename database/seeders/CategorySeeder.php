<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subcategory::truncate();
        Category::truncate();

        $categories = [
            [
                "name" => "Cases · Gabinetes",
                "subcategories" => ["Con Fuente", "Sin Fuente", "Accesorios"]
            ],
            [
                "name" => "Placas · Motherboards",
                "subcategories" => ["AMD", "Intel"]
            ],
            [
                "name" => "Procesadores",
                "subcategories" => ["AMD", "Intel"]
            ],
            [
                "name" => "Memoria Ram",
                "subcategories" => [
                    "Ram Dimm (Escritorio)",
                    "Ram Sodimm (Laptops)"
                ]
            ],
            [
                "name" => "Almacenamiento",
                "subcategories" => ["SDD sata", "SDD M.2 NVMe", "HDD"]
            ],
            [
                "name" => "Tarjetas de Video",
                "subcategories" => ["Nvidia", "Amd"]
            ],
            [
                "name" => "Refrigeración · Enfriamiento",
                "subcategories" => ["Líquido", "Aire"]
            ],
            ["name" => "Fuentes"],
            ["name" => "Pasta Térmica"],
            [
                "name" => "Periféricos",
                "subcategories" => [
                    "Mouse",
                    "Teclados",
                    "Audífonos",
                    "Mousepads",
                    "Micrófonos",
                    "Parlantes",
                    "Mandos · Joysticks",
                    "Webcams",
                    "Combos · Packs",
                    "Accesorios de Teclado"
                ]
            ],
            ["name" => "Monitores"],
            ["name" => "Escritorios"],
            ["name" => "Estabilizadores"],
            ["name" => "Laptops"]
        ];

        $categories = array_map(
            fn($category) => [
                "name" => $category["name"],
                "slug" => Str::slug($category["name"]),
                "image" => Str::slug($category["name"]) . ".png",
                "subcategories" => $category["subcategories"] ?? null
            ],
            $categories
        );

        foreach ($categories as $categoryData) {
            $subcategories = $categoryData["subcategories"];
            unset($categoryData["subcategories"]);

            /** @var Category */
            $category = Category::create($categoryData);

            if (isset($subcategories)) {
                $category->subcategories()->createMany(
                    array_map(
                        fn($subcategory) => [
                            "name" => $subcategory,
                            "slug" => Str::slug($subcategory)
                        ],
                        $subcategories
                    )
                );
            }
        }
    }
}
