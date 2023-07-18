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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('OrderID');
            $table->unsignedInteger('CustomerID');
            $table->string('OrderNumber');
            $table->dateTime('OrderDate');
            $table->string('DeliveryType');
            $table->string('PaymentType');
            $table->string('PaymentStatus');
            $table->string('DispatchStatus');
            $table->timestamps();

            $table->foreign('CustomerID')->references('CustomerID')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
