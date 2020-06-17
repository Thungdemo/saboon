<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoapProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soap_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('soap_id');
            $table->integer('soaps_produced')->default(1);
            $table->date('mfg_date')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();

            $table->foreign('soap_id')->references('id')->on('soap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soap_products');
    }
}
