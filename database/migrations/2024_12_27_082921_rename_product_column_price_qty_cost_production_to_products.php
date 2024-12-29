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
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('amount', 'qty');
            $table->renameColumn('cost_item', 'cost_production');
            $table->decimal('price', 15,0)->default();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('qty', 'amount');
            $table->renameColumn('cost_production', 'cost_item');
            $table->dropColumn('price');
        });
    }
};
