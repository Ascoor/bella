<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('section_id');
            $table->string('name');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->text('specialization');
            $table->string('phone');
            $table->string('photo');
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();

            $table->foreign('section_id')
                  ->references('id')->on('sections')
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
        Schema::dropIfExists('doctors');
    }
}
