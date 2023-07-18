<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('ProductID');
            $table->unsignedInteger('CategoryId');
            $table->string('ProductCode');
            $table->string('ProductNumber');
            $table->string('Name');
            $table->string('Description');
            $table->text('img');
            $table->decimal('Price', 8, 2);
            $table->string('Warranty')->nullable();
            $table->timestamps();

            $table->foreign('CategoryId')->references('CategoryId')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
