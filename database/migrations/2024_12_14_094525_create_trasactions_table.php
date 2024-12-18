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
        Schema::create('trasactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code', 15)->unique();
            $table->date('transaction_date')->nullable();
            $table->decimal('total_payment', total:15, places:0)->default(0);
            $table->decimal('total_paid', total:15, places:0)->default(0);
            $table->decimal('total_unpaid', total:15, places:0)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trasactions');
    }
};
