<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_id');
            $table->string('subject_id');
            $table->string('school_year_id');
            $table->string('subject_time');
            $table->string('subject_days');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_schedules');
    }
}
