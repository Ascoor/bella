<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_name');
            $table->string('email')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('pid')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('client_phone');
            $table->string('note')->nullable();
            $table->string('address')->nullable();;
            $table->string('city')->nullable();;
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
        Schema::dropIfExists('clients');
    }
}
