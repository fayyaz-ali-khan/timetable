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
        Schema::create('courses_classes', function (Blueprint $table) {
            $table->increments('id');
            // $table->bigInteger('course_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->integer('meetings')->unsigned();
            // $table->integer('academic_period_id')->unsigned();
            $table->timestamps();
            $table->foreignId('academic_period_id')->constrained('academic_periods')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            // $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');

            // $table->foreign('academic_period_id')
            //     ->references('id')
            //     ->on('academic_periods')
            //     ->onDelete('cascade');

            // $table->foreign('course_id')
            //     ->references('id')
            //     ->on('courses')
            //     ->onDelete('cascade');

            $table->foreign('class_id')
                ->references('id')
                ->on('classes')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_classes');
    }
};
