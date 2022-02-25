<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMvideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mvideos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nvideo');
            $table->string('ruta');
            $table->string('texto');
            //FOREIGN MASCOTA
            $table->integer('mascota_id')->unsigned();
            $table
                ->foreign('mascota_id')
                ->references('id')
                ->on('mascotas');
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
        Schema::dropIfExists('mvideos');
    }
}
