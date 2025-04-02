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
        Schema::create('crypto_swaps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('crypto_asset_id');
            $table->uuid('user_id');
            $table->string('swap_from')->nullable();
            $table->string('swap_to')->nullable();
            $table->decimal('amount', 11, 2);
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crypto_swaps');
    }
};
