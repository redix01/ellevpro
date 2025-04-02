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
        Schema::create('withdrawals', function (Blueprint $table) {
//            $table->id();
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->decimal('amount', 11, 2);
            $table->string('account_type');
            $table->string('wallet');
            $table->string('address')->nullable();
            $table->integer('status')->default(0);;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
