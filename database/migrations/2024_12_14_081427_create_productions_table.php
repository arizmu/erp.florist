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
        Schema::create('productions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code_production', 8)->unique();
            $table->string('produciton_title')->nullable();
            $table->date('production_date')->nullable();
            $table->boolean('production_status')->default(0);
            $table->date('produciton_end')->nullable();
            $table->decimal('production_cost', total:15, places:0)->nullable();
            $table->foreignUuid('pegawai_id')->constrained(table:'pegawais', indexName:'production_pegawai_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
