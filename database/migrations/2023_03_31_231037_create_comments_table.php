<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
    $table->id();
    $table->text('comment_text');
    $table->unsignedBigInteger('doctor_id');
    $table->unsignedBigInteger('client_id');
    $table->unsignedBigInteger('parent_id')->nullable();
    $table->timestamps();

    $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
    $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
    $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
