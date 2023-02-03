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
        Schema::create('appointment', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('doctorSpecialization')->nullable();
            $table->integer('doctorId')->nullable();
            $table->integer('userId')->nullable();
            $table->integer('consultancyFees')->nullable();
            $table->string('appointmentDate')->nullable();
            $table->string('appointmentTime')->nullable();
            $table->timestamp('postingDate')->nullable()->useCurrent();
            $table->integer('userStatus')->nullable();
            $table->integer('doctorStatus')->nullable();
            $table->timestamp('updationDate')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment');
    }
};
