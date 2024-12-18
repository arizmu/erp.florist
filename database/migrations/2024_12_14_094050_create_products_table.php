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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('product_name')->nullable();
            $table->text('comment')->nullable();
            $table->integer('amount')->default(0);
            $table->decimal('cost_item', total:15, places:0)->default(0);
            $table->foreignUuid('jensi_product_id')->constrained(table:'jenis_products', indexName:'product_jenis_product_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
