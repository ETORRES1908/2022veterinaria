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
            //FOREIGN USER
            $table->integer('jueza_id')->unsigned();
            $table->foreign('jueza_id')->references('id')->on('users');
            //FOREIGN USER
            $table->integer('juezb_id')->unsigned();
            $table->foreign('juezb_id')->references('id')->on('users');
            //COLISEUM
            $table->string('coliseum');
            //TITLE
            $table->string('title');
            //TYPE EVENT
            $table->string('tevent');
            //REGULATION
            $table->string('trule');
            //DATE START
            $table->string('fstart');
            //DATE END
            $table->string('fend');
            //TIME START
            $table->string('hstart');
            //TIME END
            $table->string('hend');
            //TROPHY
            $table->string('trophy');
            //ROOSTER
            $table->string('rooster');
            //DUEL
            $table->string('duel');
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
