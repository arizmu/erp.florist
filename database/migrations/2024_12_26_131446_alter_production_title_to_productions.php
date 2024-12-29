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
        Schema::table('productions', function (Blueprint $table) {
            $table->renameColumn('produciton_title', 'production_title');
            $table->renameColumn('produciton_end', 'production_end');
            $table->date('production_start')->nullable()->after('production_end');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productions', function (Blueprint $table) {
            $table->renameColumn('production_title', 'produciton_title');
            $table->renameColumn('production_end', 'produciton_end');
            $table->dropColumn('production_start');
        });
    }
};
