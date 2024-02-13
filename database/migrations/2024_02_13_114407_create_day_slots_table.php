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
        Schema::create('day_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->constrained()->cascadeOnDelete();
            $table->foreignId('slot_id')->constrained('table_timeslots')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('day_slots');
    }
};
