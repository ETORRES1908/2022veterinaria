<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LParticipantes', function (Blueprint $table) {
            $table->increments('id');
            //FOREIGN MASCOTA
            $table->integer('evento_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
            //FOREIGN MASCOTA
            $table->integer('mascota_id')->unsigned();
            $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade');
            //STATUS
            $table->string('status'); //estado
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
        Schema::dropIfExists('LParticipantes');
    }
}
