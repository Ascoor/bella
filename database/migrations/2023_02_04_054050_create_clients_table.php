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

            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('phone_number')->nullable()->unsigned();
            $table->text('photo')->nullable()->unsigned();
            $table->string('details')->default('take your notes always about client');
    
    
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
