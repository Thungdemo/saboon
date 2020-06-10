<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoapIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soap_ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('soap_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->decimal('quantity',12,2);
            $table->timestamps();

            $table->foreign('soap_id')->references('id')->on('soap');
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
        Schema::dropIfExists('soap_ingredients');
    }
}
