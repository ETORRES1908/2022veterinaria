<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->increments('id');
            //FOREIGN USER
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('REGANI')->nullable();
            $table->string('fnac');
            $table->string('sss')->nullable(); //PESO
            $table->string('raza')->nullable(); //RAZA
            $table->string('size');
            $table->string('nombre');
            $table->string('gender');
            $table->string('plc')->nullable();; //PLACA
            $table->string('lck')->nullable();; //CASILLERO
            $table->string('plu'); //COLOR
            $table->string('pad')->nullable(); //PADRE
            $table->string('mad')->nullable(); //MADRE
            $table->string('des'); //DISABILITY
            $table->string('icbc')->nullable(); //INCUBACIÓN
            $table->string('hvs')->nullable(); //HUEVOS
            $table->string('ncr')->nullable(); //NACIERON
            $table->string('sena')->nullable(); //SENASA
            $table->string('obs')->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('mascotas');
    }
}
