<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacunas', function (Blueprint $table) {
            $table->increments('id');
            //FOREIGN MASCOTA
            $table->integer('mascota_id')->unsigned();
            $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade');
            $table->string('vcnsf');
            $table->string('vcnst');
            $table->string('vcnsm');
            $table->string('vcnsd');
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
        Schema::dropIfExists('vacunas');
    }
}
