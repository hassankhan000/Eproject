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
        Schema::create('dispatches', function (Blueprint $table) {
            $table->increments('DispatchID');
            $table->unsignedInteger('OrderID');
            $table->dateTime('DispatchDate');
            $table->unsignedInteger('DispatchedBy');
            $table->string('DeliveryStatus');
            $table->timestamps();

            $table->foreign('OrderID')->references('OrderID')->on('orders');
            $table->foreign('DispatchedBy')->references('EmployeeID')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatches');
    }
};
