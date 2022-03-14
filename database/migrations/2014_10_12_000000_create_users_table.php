<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('name', 20); //USERNAME
            $table->string('usert', 20); //USER TYPE
            $table->string('nombre', 20); //NOMBRE
            $table->string('apellido', 40); //APELLIDO
            $table->string('foto')->default('user.png'); //FOTO
            $table->string('dni', 8); //DNI
            $table->string('discapacidad'); //DISABILITY
            $table->string('galpon'); //GALPON
            $table->string('prepa'); //Preparer
            $table->string('email')->unique(); //EMAIL
            $table->string('company'); //COMPAÑIA
            $table->string('celular')->unique(); //PHONE
            $table->string('country'); //COUNTRY
            $table->string('state'); //STATE - ESTADO
            $table->string('district'); //DISTRITO
            $table->string('direction'); //DIRECTION
            $table->string('job'); //TRABAJO
            $table->string('password'); //CONTRASEÑA
            $table->string('status')->default('0'); //estado

            $table->string('answer'); //ANSWER
            $table->string('fdpt')->nullable(); //FOTO
            $table->string('sdpt')->nullable(); //FOTO
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
        Schema::dropIfExists('users');
    }
}
