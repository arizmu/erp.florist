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
        Schema::rename('trasactions', 'transactions');
        Schema::rename('trasaction_details', 'details_transactions');
        Schema::rename('trasaction_pembayarans', 'payment_transactions');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('transactions', 'trasactions');
        Schema::rename('details_transactions', 'trasaction_details');
        Schema::rename('payment_transactions', 'trasaction_pembayarans');
    }
};
