<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unavailable_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id')->unsigned();
            // $table->integer('room_id')->unsigned();
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->timestamps();

            $table->foreign('class_id')
                ->references('id')
                ->on('classes')
                ->onDelete('cascade');

            // $table->foreign('room_id')
            //     ->references('id')
            //     ->on('rooms')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unavailable_rooms');
    }
};
