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
        Schema::table('time_requests', function (Blueprint $table) {
            // Add donor_id column (nullable)
            $table->unsignedBigInteger('donor_id')->nullable()->after('user_id');

            // Foreign key to users table
            $table->foreign('donor_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('time_requests', function (Blueprint $table) {
            // Drop foreign key first, then column
            $table->dropForeign(['donor_id']);
            $table->dropColumn('donor_id');
        });
    }
};
