<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateestudiantesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carrera_id')->unsigned();
/*            $table->integer('user_id')->unsigned();*/
            $table->string('codigo', 15);
            $table->string('nombre', 60);
            $table->string('apellidos', 80);
            $table->string('sexo');
            $table->timestamps();
            $table->softDeletes();

/*            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');*/
                
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
        Schema::drop('estudiantes');
    }
}
