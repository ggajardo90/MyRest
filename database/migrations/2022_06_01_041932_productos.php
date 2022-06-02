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
        //
        Schema::create('productos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('categoria_id')->unsigned();
            $table->string('nombre');
            $table->decimal('precio', 8, 2);
            $table->integer('stock');
            $table->string('descripcion');
            $table->string('imagen');
            $table->boolean('activo')->default(0);
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
