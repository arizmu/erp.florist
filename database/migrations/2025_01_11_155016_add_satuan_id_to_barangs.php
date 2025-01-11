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
        Schema::table('barangs', function (Blueprint $table) {
            $table->foreignId('satuan_barang_id')->nullable()->constrained(table:'satuan_barangs', indexName:'fk_satuan_barang_to_barangs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign('fk_satuan_barang_to_barangs');
            $table->dropColumn('satuan_barang_id');
        });
    }
};
