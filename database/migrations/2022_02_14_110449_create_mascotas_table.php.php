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
            $table->string('sss');
            $table->string('nombre');
            $table->string('plc');
            $table->string('plu');
            $table->string('pad');
            $table->string('mad');
            $table->string('des');
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
