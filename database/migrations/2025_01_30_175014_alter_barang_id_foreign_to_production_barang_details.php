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
        Schema::table('production_barang_details', function (Blueprint $table) {
            $table->foreignUuid('barang_id')->nullable()->constrained(table:"barangs", column:'id', indexName:"production_barang_details_barnag_id")->cascadeOnUpdate()->onDelete("set null")->after("cost_item");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('production_barang_details', function (Blueprint $table) {
            $table->dropForeign('production_barang_details_barnag_id');
            $table->dropColumn('barang_id');
        });
    }
};
