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
        Schema::table('crypto_assets', function (Blueprint $table) {
            $table->decimal('usd_rate', 18, 8)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('crypto_assets', function (Blueprint $table) {
            $table->dropColumn('usd_rate');
        });
    }
};
