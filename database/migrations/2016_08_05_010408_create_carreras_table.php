<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatecarrerasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sede_id')->unsigned();
            $table->string('nombre', 120);
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('sede_id')
               ->references('id')->on('sedes')
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
        Schema::drop('carreras');
    }
}
