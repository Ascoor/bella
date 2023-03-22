<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoiceDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('invoice_id')->unsigned();
            $table->foreign('invoice_id')->references('id')->on('invoices')

            ->onDelete('cascade');
            $table->unsignedTinyInteger('value_status')->default(2);
            $table->string('status', 50)->default('غير مدفوعة');
            $table->string('payment_date')->nullable();
            $table->text('note')->nullable();
            $table->string('user_id', 300);
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
        //
    }
}
