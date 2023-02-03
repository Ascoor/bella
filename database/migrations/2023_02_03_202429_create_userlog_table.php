<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userlog', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('uid')->nullable();
            $table->string('username')->nullable();
            $table->binary('userip', 16)->nullable();
            $table->timestamp('loginTime')->nullable();
            $table->string('logout')->nullable();
            $table->integer('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userlog');
    }
}
