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
            // check field discount is available skip craeate filed 
            if (!Schema::hasColumn('payment_transactions', 'discount')) {
                $table->decimal('discount', 15, 2)->default(0)->after('total_cashback');
            }

            // check point is available skip
            if (!Schema::hasColumn('payment_transactions', 'point')) {
                $table->decimal('point', 15, 2)->default(0)->after('total_cashback');
            }

            // check payment_amount is available skip
            if (!Schema::hasColumn('payment_transactions', 'payment_amount')) {
                $table->decimal('payment_amount', 15, 2)->default(0)->after('total_cashback');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_transactions', function (Blueprint $table) {
            // check field discount point and payment_amount available drop columns
            if (Schema::hasColumn('payment_transactions', 'discount')) {
                $table->dropColumn('discount');
            }

            if (Schema::hasColumn('payment_transactions', 'point')) {
                $table->dropColumn('point');
            }

            if (Schema::hasColumn('payment_transactions', 'payment_amount')) {
                $table->dropColumn('payment_amount');
            }
        });
    }
};
