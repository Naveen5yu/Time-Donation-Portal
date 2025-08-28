<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateTimeRequestsStatusToAccepted extends Migration
{
    public function up()
    {
        // Step 1: Update 'approved' to 'accepted' and handle invalid values
        DB::table('time_requests')
            ->where('status', 'approved')
            ->update(['status' => 'accepted']);
        DB::table('time_requests')
            ->whereNotIn('status', ['pending', 'accepted', 'rejected'])
            ->orWhereNull('status')
            ->update(['status' => 'pending']);

        // Step 2: Change the column type to enum with correct values
        Schema::table('time_requests', function (Blueprint $table) {
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending')->change();
        });
    }

    public function down()
    {
        // Step 1: Revert 'accepted' to 'approved'
        DB::table('time_requests')
            ->where('status', 'accepted')
            ->update(['status' => 'approved']);

        // Step 2: Revert to original enum values
        Schema::table('time_requests', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->change();
        });
    }
}