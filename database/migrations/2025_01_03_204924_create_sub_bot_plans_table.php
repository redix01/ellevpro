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
        Schema::create('sub_bot_plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bot_plan_id')->nullable();
            $table->bigInteger('user_id');
            $table->string('pair')->nullable();
            $table->decimal('amount', 11, 2);
            $table->decimal('profit', 11, 2)->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_bot_plans');
    }
};
