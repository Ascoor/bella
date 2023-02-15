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
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('doctor_id');

            $table->text('notes')->nullable();

                $table->dateTime('appointment_time')->nullable();
                $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
                $table->timestamps();

$table->foreign('doctor_id')->references('id')->on('doctors')->cascadeOnDelete();
            $table->foreign('client_id')
                  ->references('id')->on('clients')
                  ->onDelete('cascade');
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
