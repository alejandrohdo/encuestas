<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();;
            $table->string('email')->unique();
            $table->string('password');
            $table->string('apellidos')->required();
            $table->enum('tipo_usuario', array('1'=>'Administrador', '2'=>'Invitado'), '2');
            $table->enum('estatus', array('1'=>'Activo', '2'=>'Inactivo'), '1');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
