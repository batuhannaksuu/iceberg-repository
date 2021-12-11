<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('contact_id')->unsigned()->index();
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->string('appointment_address');
            $table->dateTime('appointment_date');
            $table->string('post_code');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('distance')->nullable();
            $table->dateTime('travel_start_time')->nullable();
            $table->dateTime('travel_end_time')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('appointments');
    }
}
