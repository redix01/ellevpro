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
        Schema::create('copied_trades', function (Blueprint $table) {
//            $table->id();
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('copy_trader_id');
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
        Schema::dropIfExists('copied_trades');
    }
};
