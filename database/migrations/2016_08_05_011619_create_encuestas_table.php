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
            $table->integer('estudiante_id')->unsigned();
            $table->integer('carrera_id')->unsigned();
            $table->string('nombre', 60);
            $table->string('vivienda');
            $table->string('vive', 60);
            $table->string('gastoEstudio');
            $table->string('procedencia', 80);
            $table->integer('nota_ingreso');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('estudiante_id')
                ->references('id')->on('estudiantes')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');

            $table->foreign('carrera_id')
                ->references('id')->on('carreras')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
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
