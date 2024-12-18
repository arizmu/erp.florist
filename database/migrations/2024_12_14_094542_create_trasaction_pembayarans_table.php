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
        Schema::create('trasaction_pembayarans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('transaction_id')->constrained(table:'trasactions', indexName:'tr_pembayaran_transaction_id');
            $table->decimal('total_payment', total:15, places:0)->default(0);
            $table->decimal('total_paid', total:15, places:0)->default(0);
            $table->decimal('total_unpaid', total:15, places:0)->default(0);
            $table->boolean('payment_method')->default(0)->comment('status true if the payment method using transfer or qris, and then false if using cash money for payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trasaction_pembayarans');
    }
};
