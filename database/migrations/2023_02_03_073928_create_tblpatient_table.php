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
        Schema::create('tblpatient', function (Blueprint $table) {
            $table->integer('ID', true);
            $table->integer('Docid')->nullable();
            $table->string('PatientName', 200)->nullable();
            $table->bigInteger('PatientContno')->nullable();
            $table->string('PatientEmail', 200)->nullable();
            $table->string('PatientGender', 50)->nullable();
            $table->mediumText('PatientAdd')->nullable();
            $table->integer('PatientAge')->nullable();
            $table->mediumText('PatientMedhis')->nullable();
            $table->timestamp('CreationDate')->nullable()->useCurrent();
            $table->timestamp('UpdationDate')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblpatient');
    }
};
