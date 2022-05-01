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
            $table->string('name', 30); //USERNAME
            $table->string('usert', 20); //USER TYPE
            $table->string('nombre', 20); //NOMBRE
            $table->string('apellido', 40); //APELLIDO
            $table->string('foto')->default('user.png'); //FOTO
            $table->string('dni', 20)->unique()->nullable(); //DNI
            $table->string('discapacidad'); //DISABILITY
            $table->string('galpon')->nullable(); //GALPON
            $table->string('prepa')->nullable(); //Preparer
            $table->string('email')->unique(); //EMAIL
            $table->string('company')->nullable(); //COMPAÑIA
            $table->string('celular')->unique(); //PHONE
            $table->string('country'); //COUNTRY
            $table->string('state'); //STATE - ESTADO
            $table->string('district')->nullable();; //DISTRITO
            $table->string('direction')->nullable();; //DIRECTION
            $table->string('job')->nullable();; //TRABAJO
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
