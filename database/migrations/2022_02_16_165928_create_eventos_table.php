<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            //FOREIGN USER
            $table->integer('organizador_id')->unsigned();
            $table->foreign('organizador_id')->references('id')->on('users')->onDelete('cascade');
            //DATES
            $table->json('fechas');
            //COLISEUM
            //FOREIGN USER
            $table->integer('coliseo_id')->unsigned();
            $table->foreign('coliseo_id')->references('id')->on('coliseos');
            //TYPE EVENT
            $table->string('tevent');
            //REGULATION
            $table->string('trl');
            //ESPUELAS
            $table->json('spl');
            //SIZE
            $table->string('sz');
            //TIME
            $table->string('time');
            //MIN WEIGHT
            $table->string('miw');
            //MAX WEIGHT
            $table->string('maw');
            //FIRST TIME WEIGHT
            $table->string('ftw');
            //SECOND TIME WEIGHT
            $table->string('stw');
            //TIME START
            $table->string('hstart');
            //FOREIGN USER
            $table->integer('mcontrol_id')->unsigned();
            $table->foreign('mcontrol_id')->references('id')->on('users');
            //FOREIGN USER
            $table->integer('judge_id')->unsigned();
            $table->foreign('judge_id')->references('id')->on('users');
            //FOREIGN USER
            $table->integer('assistent_id')->unsigned();
            $table->foreign('assistent_id')->references('id')->on('users');
            //AWARDS
            $table->string('awards');
            //THOPYS
            $table->string('trophys');
            //ROOSTER
            $table->string('rooster');
            //TIME ROOSTER
            $table->string('trooster');
            //ROOSTER 10
            $table->string('rten');
            //1 FRENTE
            $table->string('fft');
            //2 FRENTE
            $table->string('sft');
            //3 FRENTE
            $table->string('tft');
            //PELEA DE CALIDAD
            $table->string('fcd');
            //PAVOS
            $table->string('pvs');
            //LECHONES
            $table->string('lch');
            //CANASTAS
            $table->string('cnt');
            //SACO
            $table->string('skg');
            //ENTRADA GENERAL
            $table->string('egn');
            //ENTRADA VIP
            $table->string('evp');
            //PACTADO
            $table->string('pct');
            //BASE
            $table->string('bs');
            //INSCRIPCIÓNES
            //FRENTE
            $table->string('ift');
            //GALLO
            $table->string('gll');
            //GALPON
            $table->string('glp');
            //CHALLENGE1
            $table->string('chll1')->nullable();
            //CHALLENGE2
            $table->string('chll2')->nullable();
            //STATUS
            $table->string('status')->default('0'); //estado
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
        Schema::dropIfExists('eventos');
    }
}
