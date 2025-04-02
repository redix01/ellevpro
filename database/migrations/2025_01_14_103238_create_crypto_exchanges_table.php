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
        Schema::create('crypto_exchanges', function (Blueprint $table) {
            $table->id();
            $table->uuid('crypto_asset_id');
            $table->uuid('user_id');
            $table->decimal('amount')->nullable();
            $table->decimal('crypto_value')->nullable();
            $table->integer('status')->default(0);
            $table->string('type')->nullable();
            $table->string('withdrawal_wallet')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crypto_exchanges');
    }
};
