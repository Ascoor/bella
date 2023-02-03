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
        Schema::create('doctors', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('specilization')->nullable();
            $table->string('doctorName')->nullable();
            $table->longText('address')->nullable();
            $table->string('docFees')->nullable();
            $table->bigInteger('contactno')->nullable();
            $table->string('docEmail')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('creationDate')->nullable()->useCurrent();
            $table->timestamp('updationDate')->useCurrentOnUpdate()->nullable();
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
};
