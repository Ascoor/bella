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
        Schema::create('tblcontactus', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('contactno')->nullable();
            $table->mediumText('message')->nullable();
            $table->timestamp('PostingDate')->nullable()->useCurrent();
            $table->mediumText('AdminRemark')->nullable();
            $table->timestamp('LastupdationDate')->useCurrentOnUpdate()->nullable();
            $table->integer('IsRead')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblcontactus');
    }
};
