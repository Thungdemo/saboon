<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ingredient_id');
            $table->decimal('rate',12,2)->nullable();
            $table->decimal('quantity',12,2);
            $table->decimal('total_cost',12,2);
            $table->date('purchase_date')->nullable();
            $table->string('batch',50)->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('ingredient_purchases');
    }
}
