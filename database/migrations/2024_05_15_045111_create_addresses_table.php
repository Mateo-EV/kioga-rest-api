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
        Schema::create("addresses", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("user_id")
                ->constrained("users")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("dni", 10);
            $table->string("phone", 20);
            $table->string("department")->nullable();
            $table->string("province")->nullable();
            $table->string("district")->nullable();
            $table->string("street_address")->nullable();
            $table->string("zip_code")->nullable();
            $table->text("reference")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("addresses");
    }
};
