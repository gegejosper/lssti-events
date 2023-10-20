<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate_attendances', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('course');
            $table->string('event');
            $table->string('date_log');
            $table->string('time_log');
            $table->string('log_type');
            $table->string('log_count');
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
        Schema::dropIfExists('gate_attendances');
    }
};
