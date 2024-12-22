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
        Schema::table('category_barangs', function (Blueprint $table) {
            $table->renameColumn('catogory_name', 'category_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_barangs', function (Blueprint $table) {
            $table->renameColumn('category_name', 'catogory_name');
        });
    }
};
