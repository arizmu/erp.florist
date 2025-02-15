<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('costumers', function (Blueprint $table) {
            $table->text('alamat')->nullable()->change();
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Ensure no NULL values before modifying columns
        DB::statement("UPDATE costumers SET alamat = '' WHERE alamat IS NULL");
        DB::statement("UPDATE costumers SET email = '' WHERE email IS NULL");


        Schema::table('costumers', function (Blueprint $table) {
            $table->text('alamat')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
        });
    }
};
