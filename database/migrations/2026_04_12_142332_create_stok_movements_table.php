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
        Schema::create('stok_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('barang_id')->nullable()->constrained(
                table: 'barangs',
                column: 'id'
            )->cascadeOnUpdate()->nullOnDelete();
            $table->integer('qty');
            $table->integer('qty_awal');
            $table->integer('qty_akhir');
            $table->boolean('type')->default(0)->comment('1 = masuk, 0 = keluar');
            $table->text('keterangan');
            $table->foreignUuid('pegawai_id')->nullable()->constrained(
                table: 'pegawais',
                column: 'id'
            )->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_movements');
    }
};
