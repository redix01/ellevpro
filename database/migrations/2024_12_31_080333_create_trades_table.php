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
        Schema::create('trades', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->decimal('amount', 11, 2)->nullable();
            $table->string('acct_type')->nullable();
            $table->string('market')->nullable();
            $table->string('crypto_pair')->nullable();
            $table->string('forex_pair')->nullable();
            $table->string('stock_pair')->nullable();
            $table->string('common_pair')->nullable();
            $table->string('indices_pair')->nullable();
            $table->string('bond_pair')->nullable();
            $table->string('etf_pair')->nullable();
            $table->string('time_interval')->nullable();
            $table->string('stop_loss')->nullable();
            $table->string('take_profit')->nullable();
            $table->string('trade_type')->nullable();
            $table->integer('status')->default(0);
            $table->uuid('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
