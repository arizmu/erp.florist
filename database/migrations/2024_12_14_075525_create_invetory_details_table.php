<?php

use App\Models\invetory\Invetory;
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
        Schema::create('invetory_details', function (Blueprint $table) {
            // $table->id();
            $table->foreignUuid('inventory_id')->constrained(table:'inventories', indexName:'inventory_detail_invotory_id');
            $table->foreignUuid('barang_id')->constrained(table:'barangs', indexName:'invetory_detail_barang_id');
            $table->integer('jumlah')->default(0);
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invetory_details');
    }
};
