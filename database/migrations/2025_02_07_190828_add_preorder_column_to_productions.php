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
            $table->boolean('preorder')->default(false)->after('production_status');
            $table->char('jasa_reference', 36)->nullable()->after('pegawai_id');
            $table->decimal('nilai_jasa_crafter')->default(0)->after('pegawai_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productions', function (Blueprint $table) {
            $table->dropColumn('preorder');
            $table->dropColumn('jasa_reference');
            $table->dropColumn('nilai_jasa_crafter');
        });
    }
};
