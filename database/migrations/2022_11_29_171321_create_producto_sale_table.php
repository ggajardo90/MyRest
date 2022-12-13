<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_sale', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("producto_id");
            $table->integer('quantity');
            $table->unsignedBigInteger("sale_id");
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('sale_id')->references('id')->on('sales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_sale');
    }
};
