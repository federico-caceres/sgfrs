<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->string('cedula')->primary();
            $table->integer('id_usuario')->references('id')->on('users')->unique();
            $table->integer('id_grupo')->references('id_grupo')->on('grupos_recibos');
            $table->integer('id_rol')->foreign('id_rol')->references('id_rol')->on('roles');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('tel');
            $table->string('cel');
            $table->string('dpto');
            $table->string('cargo');
            $table->string('correo');
            $table->boolean('estado');
            $table->string('obs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}