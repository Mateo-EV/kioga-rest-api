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
        Schema::create("order_products", function (Blueprint $table) {
            $table
                ->foreignId("order_id")
                ->constrained("orders")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table
                ->foreignId("product_id")
                ->constrained("products")
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->primary(["order_id", "product_id"]);

            $table->integer("quantity")->default(1);
            $table->decimal("unit_amount", 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("order_products");
    }
};
