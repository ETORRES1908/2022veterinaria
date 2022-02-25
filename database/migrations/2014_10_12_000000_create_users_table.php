<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('nombre', 20);
            $table->string('apellido', 40);
            $table->string('foto')->default('user.png');
            $table->string('dni', 8);
            $table->string('discapacidad');
            $table->string('galpon');
            $table->string('prepa');
            $table->string('email')->unique();
            $table->string('company');
            $table->string('celular')->unique();
            $table->string('country');
            $table->string('state');
            $table->string('district');
            $table->string('direction');
            $table->string('job');
            $table->string('password');
            $table->string('question');
            $table->string('answer');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
