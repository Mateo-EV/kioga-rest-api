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
        Schema::create("orders", function (Blueprint $table) {
            $table->id();
            $table->decimal("amount", 10, 2);
            $table
                ->foreignId("user_id")
                ->constrained("users")
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table
                ->foreignId("payment_method_id")
                ->constrained("payment_methods")
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->string("payment_status");
            $table->enum("status", [
                "pendiente", // Creado
                "en espera", // En espera para ser recogido
                "enviado", // Enviado al cliente
                "entregado", // Entregado al cliente
                "cancelado", // Pedido cancelado por el cliente
                "reembolsado" // Reembolsado por el cliente
            ]);
            $table->decimal("shipping_amount", 10, 2);
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
