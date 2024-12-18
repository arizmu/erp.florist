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
        Schema::create('production_barang_details', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('production_id')->constrained(table:'productions', indexName:'production_details_production_id');
            $table->foreignUuid('barang_id')->constrained(table:'barangs', indexName:'production_barang_id');
            $table->integer('amount_item')->default(0);
            $table->decimal('cost_item', total:15, places:0)->default(0);
            $table->decimal('total_cost', total:15, places:0)->default(0);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_barang_details');
    }
};
