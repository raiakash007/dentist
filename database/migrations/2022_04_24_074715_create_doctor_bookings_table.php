<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doctor_id')->unsigned()->index()->nullable();
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');            
            $table->bigInteger('patient_id')->unsigned()->index()->nullable();
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('consultFor');
            $table->string('medicalHistory');
            $table->string('date');
            $table->string('slot');
            $table->string('time');
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
        Schema::dropIfExists('doctor_bookings');
    }
}
