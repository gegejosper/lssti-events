<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_attendances', function (Blueprint $table) {
            $table->id();
            $table->string('school_year');
            $table->string('student_id');
            $table->string('subject_id');
            $table->string('teacher_id');
            $table->string('attendance_record');
            $table->string('log_time');
            $table->string('status');
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
        Schema::dropIfExists('subject_attendances');
    }
}
