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
        Schema::create('sale_table', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("table_id");
            $table->unsignedBigInteger("sale_id");
            $table->timestamps();

            $table->foreign('table_id')->references('id')->on('tables');
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
        Schema::dropIfExists('sale_table');
    }
};
