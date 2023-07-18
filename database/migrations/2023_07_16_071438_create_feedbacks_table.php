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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('FeedbackID');
            $table->unsignedInteger('CustomerID');
            $table->text('FeedbackText');
            $table->dateTime('FeedbackDate');
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
        Schema::dropIfExists('feedbacks');
    }
};
