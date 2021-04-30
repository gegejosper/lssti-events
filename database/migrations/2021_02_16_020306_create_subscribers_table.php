<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id'); 
            $table->string('application_number'); 
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('plan_type');
            $table->string('contact_number');
            $table->text('house_no');
            $table->text('street');
            $table->string('province');
            $table->string('municipality');
            $table->string('brgy');
            $table->string('surveyed_by');
            $table->string('approved_by');
            $table->string('team_leader');
            $table->string('installation_date');
            $table->string('tracing_number');
            $table->string('c_number');
            $table->string('np');
            $table->string('np_number');
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
        Schema::dropIfExists('subscribers');
    }
}
