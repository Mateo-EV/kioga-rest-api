<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("products", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug")->unique();
            $table->string("description");
            $table->decimal("price", 10, 2);
            $table->decimal("discount", 3, 2);
            $table->string("image");
            $table->integer("stock")->default(0);
            $table
                ->foreignId("category_id")
                ->constrained("categories")
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table
                ->foreignId("subcategory_id")
                ->nullable()
                ->constrained("subcategories")
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table
                ->foreignId("brand_id")
                ->constrained("brands")
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->boolean("is_active")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("products");
    }
};
