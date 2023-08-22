<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDayMonthColumnSubjectAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subject_attendances', function (Blueprint $table) {
            //
            $table->string('log_year');
            $table->string('log_day');
            $table->string('log_month');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subject_attendances', function (Blueprint $table) {
            //
        });
    }
}
