<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

        public function up()
        {
            Schema::create('expenses', function (Blueprint $table) {
                $table->id();
                $table->date('expense_date');
                $table->decimal('expense_value', 8, 2);

                $table->string('expense_to');
                $table->text('expense_notes')->nullable();
                $table->timestamps();
                $table->unsignedBigInteger('add_id');
$table->foreign('add_id')->references('id')->on('users');
                $table->unsignedBigInteger('expense_type_id');
$table->foreign('expense_type_id')->references('id')->on('expense_types');

            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
