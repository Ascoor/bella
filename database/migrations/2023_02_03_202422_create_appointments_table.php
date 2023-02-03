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
            $table->integer('id');
            $table->string('doctorSpecialization')->nullable();
            $table->integer('doctorId')->nullable();
            $table->integer('userId')->nullable();
            $table->integer('consultancyFees')->nullable();
            $table->string('appointmentDate')->nullable();
            $table->string('appointmentTime')->nullable();
             $table->integer('userStatus')->nullable();
            $table->integer('doctorStatus')->nullable();
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
