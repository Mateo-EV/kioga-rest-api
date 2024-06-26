<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("orders", function (Blueprint $table) {
            $table->id();
            $table->decimal("amount", 10, 2);
            $table->string("payment_id", 15)->nullable();
            $table
                ->foreignId("user_id")
                ->constrained("users")
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->enum("status", Order::$status_enum);
            $table->decimal("shipping_amount", 10, 2)->default(0);
            $table->boolean("is_delivery")->default(false);
            $table
                ->foreignId("address_id")
                ->constrained("addresses")
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->text("notes")->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("orders");
    }
};
