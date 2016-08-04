<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateencuestasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 60);
            $table->string('vivienda', 30);
            $table->string('vive_con', 40);
            $table->string('gastos_estudio', 60);
            $table->string('procedencia', 80);
            $table->integer('nota_ingreso');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('encuestas');
    }
}
