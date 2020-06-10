<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoapProducedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soap_produced', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('soap_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->decimal('units_consumed',12,2);
            $table->string('batch',100)->nullable();
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
        Schema::dropIfExists('soap_produced');
    }
}
