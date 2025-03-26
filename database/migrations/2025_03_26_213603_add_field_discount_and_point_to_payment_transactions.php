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
        Schema::table('payment_transactions', function (Blueprint $table) {
            $table->decimal('discount', total:15, places:2)->default(0)->after('total_paid');
            $table->decimal('point', total:15, places:2)->default(0)->after('discount');
            $table->decimal('payment_amount', total:15, places:2)->default(0)->after('total_cashback');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_transactions', function (Blueprint $table) {
            $table->dropColumn('discount');
            $table->dropColumn('point');
            $table->dropColumn('payment_amount');
        });
    }
};
