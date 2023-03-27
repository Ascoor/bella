<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('assest_name');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->unsignedBigInteger('section_id');
            $table->string('phone');
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assests');
    }
}
