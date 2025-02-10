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
        Schema::create('costume_detail_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('details_transactions_id')->nullable()->constrained(table:"details_transactions", column:'id', indexName:"fk_to_details_transactions_id");
           $table->boolean('status_item')->default(0)->comment('true is a item other for acoumodasi, false ia a product barang foorm master barang');
           $table->char("code_item", 36)->nullable();
           $table->string('item_name')->nullable();
           $table->text("comment")->nullable();
           $table->integer("qty")->default(0);
           $table->decimal('price', 25, 0)->default(0);    
           $table->decimal('total_price', 25, 0)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costume_detail_transactions');
    }
};
