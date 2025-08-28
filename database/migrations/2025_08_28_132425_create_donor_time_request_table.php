<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorTimeRequestTable extends Migration
{
    public function up()
    {
        Schema::create('donor_time_request', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donor_id');
            $table->unsignedBigInteger('time_request_id');
            $table->string('action')->default('rejected'); // Tracks donor's action (e.g., 'rejected')
            $table->timestamps();

            $table->foreign('donor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('time_request_id')->references('id')->on('time_requests')->onDelete('cascade');
            $table->unique(['donor_id', 'time_request_id']); // Prevent duplicate actions
        });
    }

    public function down()
    {
        Schema::dropIfExists('donor_time_request');
    }
}