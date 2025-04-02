<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('crypto_assets', function (Blueprint $table) {
//            $table->id();
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->decimal('balance', 15, 2)->default(0.0);
            $table->decimal('price', 11, 2)->default(0.0);
            $table->decimal('change', 11, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crypto_assets');
    }
};
