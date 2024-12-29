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
        Schema::create('production_other_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('production_id')->constrained(table:"productions", column:'id',indexName:"fk_production_id_to_other_details");
            $table->string('item_name', 150)->nullable();
            $table->integer('qty')->default(0);
            $table->decimal('cost', 15, 0)->default(0);
            $table->decimal('total_cost', 15, 0)->default(0);
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_other_details');
    }
};
