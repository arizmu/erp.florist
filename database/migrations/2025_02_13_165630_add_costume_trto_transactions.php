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
        Schema::table('transactions', function (Blueprint $table) {
            $table->boolean('deleted_status')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->string('deleted_by_user', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            if (Schema::hasColumn('transactions', 'deleted_status')) {
                $table->dropColumn('deleted_status');
            }
            if (Schema::hasColumn('transactions', 'deleted_at')) {
                $table->dropColumn('deleted_at');
            }
            if (Schema::hasColumn('transactions', 'deleted_by_user')) {
                $table->dropColumn('deleted_by_user');
            }

        });
    }
};
