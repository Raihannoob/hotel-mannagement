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
        Schema::create('room_booking_details', function (Blueprint $table) {
            $table->id();
            $table -> string('room_id')-> nullable();
            $table -> string('name')-> nullable();
            $table -> string('email')-> nullable();
            $table -> string('phone')-> nullable();
            $table -> string('startDate')->nullable();
            $table -> string('endDate') ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_booking_details');
    }
};
