<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('fullName')->nullable();
            $table->longText('address')->nullable();
            $table->string('city')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->nullable()->index('email');
            $table->string('password')->nullable();
            $table->timestamp('regDate')->nullable()->default('current_timestamp()');
            $table->timestamp('updationDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
