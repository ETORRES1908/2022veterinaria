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
            $table->integer('evento_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
            //FOREIGN USER
            $table->integer('pmascota_id')->unsigned();
            $table->foreign('pmascota_id')->references('id')->on('mascotas')->onDelete('cascade');
            $table->string('url1')->nullable();
            $table->string('fcc');
            //FOREIGN USER
            $table->integer('smascota_id')->unsigned();
            $table->foreign('smascota_id')->references('id')->on('mascotas')->onDelete('cascade');
            $table->string('url2')->nullable();
            $table->string('scc');

            $table->string('cch'); //CANCHA
            $table->string('pactada');
            $table->string('box');
            $table->string('peleap');
            $table->string('npelea');

            $table->string('result')->nullable();
            $table->string('dm')->nullable();
            $table->string('ds')->nullable();
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
