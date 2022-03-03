<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duelos', function (Blueprint $table) {
            $table->increments('id');
            //FOREIGN USER
            $table->integer('lparticipante_id')->unsigned();
            $table->foreign('lparticipante_id')->references('id')->on('lparticipantes');
            //FOREIGN USER
            $table->integer('pmascota_id')->unsigned();
            $table->foreign('pmascota_id')->references('id')->on('mascotas');
            $table->string('fcc');
            //FOREIGN USER
            $table->integer('smascota_id')->unsigned();
            $table->foreign('smascota_id')->references('id')->on('mascotas');
            $table->string('scc');
            $table->string('cch');
            $table->string('npelea');
            $table->string('result')->nullable();
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
        Schema::dropIfExists('duelos');
    }
}
