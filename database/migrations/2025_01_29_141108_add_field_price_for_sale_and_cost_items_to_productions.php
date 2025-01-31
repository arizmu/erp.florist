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
        Schema::table('productions', function (Blueprint $table) {
            $table->decimal('amount_items', 25, 0)->default(0)->after('production_cost');
            $table->decimal('price_for_sale', 25, 0)->default(0)->after('production_cost');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productions', function (Blueprint $table) {
            $table->dropColumn('amount_items');
            $table->dropColumn('price_for_sale');
        });
    }
};
