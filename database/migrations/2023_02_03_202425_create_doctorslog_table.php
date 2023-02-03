<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorslogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctorslog', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('uid')->nullable();
            $table->string('username')->nullable();
            $table->binary('userip', 16)->nullable();
            $table->timestamp('loginTime')->nullable()
            ;          $table->string('logout')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('doctorslog');
    }
}
