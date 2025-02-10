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
        Schema::table('details_transactions', function (Blueprint $table) {
            $table->boolean('costume_status')->default(0)->comment("true is a costume product, false is not a costumer product")->after('amount_item');
            $table->decimal('costume_total', 25, 0)->default(0)->after('cost_item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('details_transactions', function (Blueprint $table) {
            $table->dropColumn('costume_status');
            $table->dropColumn('costume_total');
        });
    }
};
