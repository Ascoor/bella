<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->bigIncrements('id');
            $table->string('apt_number');
            $table->string('name');
    
            $table->string('user_id')->nullable();
            $table->string('phone');
            $table->date('apt_date');
            $table->time('apt_time');
            $table->string('remark')->nullable();
            $table->string('status')->default('pending')->comment('pending,accepted,complete,rejected');
            $table->string('invoice')->nullable();
            $table->timestamp('apply_date')->nullable()->useCurrent();
            $table->timestamp('remark_date')->useCurrent()->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
