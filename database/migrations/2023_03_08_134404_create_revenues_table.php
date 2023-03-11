<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


            Schema::create('revenues', function (Blueprint $table) {
                $table->id();
                $table->date('revenue_date');
                $table->decimal('revenue_value', 8, 2);

                $table->string('revenue_from');
                $table->text('revenue_notes')->nullable();
                $table->timestamps();
                $table->unsignedBigInteger('add_id');
$table->foreign('add_id')->references('id')->on('users');
                $table->unsignedBigInteger('income_type_id');
$table->foreign('income_type_id')->references('id')->on('income_types');


            });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revenues');
    }
}
