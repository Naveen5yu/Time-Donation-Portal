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
        Schema::create('time_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Seeker
            $table->unsignedBigInteger('donor_id')->nullable(); // Donor assigned
            $table->string('title'); // Purpose of request
            $table->text('description')->nullable();
            $table->dateTime('requested_time'); // Requested donation time
            $table->enum('status', ['pending','approved','rejected'])->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('donor_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_requests');
    }
};
