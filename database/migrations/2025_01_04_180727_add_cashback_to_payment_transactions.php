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
            $table->decimal('total_cashback', 15, 0)->default(0)->nullable()->after('total_unpaid');
            $table->char('factur_number', 15)->nullable()->after('total_cashback');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_transactions', function (Blueprint $table) {
            $table->dropColumn('total_cashback');
            $table->dropColumn('factur_number');
        });
    }
};
