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
        Schema::create('doctorspecilization', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('specilization')->nullable();
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
        Schema::dropIfExists('doctorspecilization');
    }
};
