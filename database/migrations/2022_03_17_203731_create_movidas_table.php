<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movidas', function (Blueprint $table) {
            $table->increments('id');
            //FOREIGN MASCOTA
            $table->integer('mascota_id')->unsigned();
            $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade');
            $table->string('mvf');
            $table->string('mm');
            $table->string('mvtp');
            $table->string('mvr');
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
        Schema::dropIfExists('movidas');
    }
}
