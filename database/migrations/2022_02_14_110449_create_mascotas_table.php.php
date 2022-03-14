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
            $table->string('REGGAL')->nullable();
            $table->string('fnac');
            $table->string('sss')->nullable();
            $table->string('size');
            $table->string('nombre');
            $table->string('gender');
            $table->string('plc'); //PLACA - PRECINTO
            $table->string('lck'); //CASILLERO
            $table->string('plu'); //COLOR
            $table->string('pad')->nullable(); //PADRE
            $table->string('mad')->nullable(); //MADRE
            $table->string('des'); //DISABILITY
            $table->string('icbc')->nullable(); //INCUBACIÓN
            $table->string('hvs')->nullable(); //HUEVOS
            $table->string('ncr')->nullable(); //NACIERON
            $table->string('sena')->nullable(); //SENASA
            $table->string('mvf'); //MOVIDAS
            $table->string('mm'); //MOVIDAS
            $table->string('ms'); //MOVIDAS
            $table->string('mvtp'); //MOVIDAS
            $table->string('mvr'); //MOVIDAS
            $table->string('spmt'); //SUPLEMENTO
            $table->string('obs');

            //FOREIGN USER
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
