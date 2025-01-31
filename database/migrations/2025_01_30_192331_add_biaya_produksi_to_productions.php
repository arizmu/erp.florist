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
            $table->integer('amount_items')->default(0)->change();
            $table->decimal("cost_items", 25, 0)->default(0)->after("amount_items");
            $table->decimal('production_cost', 25, 0)->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productions', function (Blueprint $table) {
            $table->decimal('amount_items', 25, 0)->default(0)->change();
            $table->dropColumn('cost_items');
            $table->decimal('production_cost', 15, 0)->default(0)->change();
        });
    }
};
