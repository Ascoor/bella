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


                $table->id();
                $table->string('name')->nullable();
                $table->string('email')->nullable();
                $table->bigInteger('phone')->nullable()->unsigned();
                $table->text('photo')->nullable()->unsigned();
        
                
                $table->string('specialty');
        
        
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
        Schema::dropIfExists('doctors');
    }
}
