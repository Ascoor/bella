<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalhistory', function (Blueprint $table) {
            $table->integer('ID')->primary();
            $table->integer('PatientID')->nullable();
            $table->string('BloodPressure', 200)->nullable();
            $table->string('BloodSugar', 200);
            $table->string('Weight', 100)->nullable();
            $table->string('Temperature', 200)->nullable();
            $table->mediumText('MedicalPres')->nullable();
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
        Schema::dropIfExists('medicalhistory');
    }
}
