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
            $table->foreign('organizador_id')->references('id')->on('users');
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
            $table->integer('assistent_id')->unsigned()->nullable();
            $table->foreign('assistent_id')->references('id')->on('users');
            //AWARDS
            $table->string('awards');
            //THOPYS
            $table->string('trophys')->nullable();
            //ROOSTER
            $table->string('rooster');
            //TIME ROOSTER
            $table->string('trooster');
            //ROOSTER 10
            $table->string('rten')->nullable();
            //1 FRENTE
            $table->string('fft')->nullable();
            //2 FRENTE
            $table->string('sft')->nullable();
            //3 FRENTE
            $table->string('tft')->nullable();
            //PELEA DE CALIDAD
            $table->string('fcd')->nullable();
            //PAVOS
            $table->string('pvs')->nullable();
            //LECHONES
            $table->string('lch')->nullable();
            //CANASTAS
            $table->string('cnt')->nullable();
            //SACO
            $table->string('skg')->nullable();
            //ENTRADA GENERAL
            $table->string('egn');
            //ENTRADA VIP
            $table->string('evp')->nullable();
            //PACTADO
            $table->string('pct');
            //BASE
            $table->string('bs')->nullable();
            //INSCRIPCIÓNES
            //FRENTE
            $table->string('ift')->nullable();
            //GALLO
            $table->string('gll')->nullable();
            //GALPON
            $table->string('glp')->nullable();
            //CHALLENGE1
            /* $table->string('fchll1')->nullable(); */
            /* $table->string('chll1')->nullable(); */
            //CHALLENGE2
            /* $table->string('fchll2')->nullable(); */
            /* $table->string('chll2')->nullable(); */
            //Internacionales
            $table->text('invi', 2000)->nullable();
            //Nacionales
            $table->text('invn', 2000)->nullable();
            //Honor
            $table->text('invhr', 2000)->nullable();
            //Homonejeados
            $table->text('invhj', 2000)->nullable();
            //Padrinos
            $table->text('invpr', 2000)->nullable();
            //OTROS
            $table->text('invot', 2000)->nullable();
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
