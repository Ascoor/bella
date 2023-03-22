<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number', 50);
            $table->date('invoice_date')->nullable();
            $table->date('due_date')->nullable();
            $table->decimal('amount_collection', 8, 2)->nullable();
            $table->decimal('discount', 8, 2)->default(0);
            $table->decimal('value_vat', 8, 2)->default(0);
            $table->decimal('rate_vat', 8, 2)->default(0);
            $table->decimal('total', 8, 2);
            $table->decimal('total_amount', 8, 2)->default('0.00')->nullable();
            $table->unsignedTinyInteger('value_status')->default(2);
            $table->enum('status', ['تم السداد', 'غير مسدده', 'مسدده جزئياً'])->default('غير مسدده');
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->text('note')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->date('payment_date')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('invoices');
    }
}
