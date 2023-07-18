<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('PaymentID');
            $table->unsignedInteger('OrderID');
            $table->string('PaymentMethod');
            $table->decimal('PaymentAmount', 8, 2);
            $table->dateTime('PaymentDate');
            $table->string('ChequeNumber')->nullable();
            $table->string('CreditCardNumber')->nullable();
            $table->timestamps();

            $table->foreign('OrderID')->references('OrderID')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
