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
        Schema::create('returns', function (Blueprint $table) {
            $table->increments('ReturnID');
            $table->unsignedInteger('OrderID');
            $table->dateTime('ReturnDate');
            $table->string('ReturnReason');
            $table->decimal('RefundAmount', 8, 2);
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
        Schema::dropIfExists('returns');
    }
};
