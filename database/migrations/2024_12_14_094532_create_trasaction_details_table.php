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
        Schema::create('trasaction_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('transaction_id')->constrained(table:'trasactions', indexName:'tr_details_transaction_id');
            $table->boolean('order_status')->comment('jika tranaksi langsung dan costume menggunakan code 0, dan apabila transaksi pre-order maka code 1');
            $table->string('production_id_or_product_id', 36)->comment('jika order value false maka id referensi dari product_id, apabila order value true id referensi dari table production')->nullable();
            $table->string('item_name')->nullable();
            $table->integer('amount_item')->dafault(0);
            $table->decimal('cost_item', total:15, places:0)->dafault(0);
            $table->decimal('total_cost', total:15, places:0)->dafault(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trasaction_details');
    }
};
