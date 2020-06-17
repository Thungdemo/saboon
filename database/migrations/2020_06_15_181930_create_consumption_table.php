<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumption', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('soap_product_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->decimal('quantity',12,2);
            $table->timestamps();

            $table->foreign('soap_product_id')->references('id')->on('soap_products');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumption');
    }
}
