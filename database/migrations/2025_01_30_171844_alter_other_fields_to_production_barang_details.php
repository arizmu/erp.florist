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
        if (!Schema::hasColumn('production_barang_details', 'item_status')) {
            Schema::table('production_barang_details', function (Blueprint $table) {
                $table->boolean('item_status')
                    ->default(false)
                    ->comment('true: other item, false: item from barang table')
                    ->after('production_id');
            });
        }

        if (Schema::hasColumn('production_barang_details', 'barang_id')) {
            Schema::table('production_barang_details', function (Blueprint $table) {
                $table->dropForeign('production_barang_id');
                $table->dropColumn('barang_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('production_barang_details', function (Blueprint $table) {
            $table->dropColumn('item_status');
        });
    }
};
