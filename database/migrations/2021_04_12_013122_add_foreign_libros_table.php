<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // UTILIZAMOS LA TABLA DE LIBROS LA CUAL YA ESTA CREADA, Y LE ASIGNAMOS LOS PARAMETROS FALTANTES DE LOS CAMPOS FORANEOS, YA QUE NO SE PUEDEN AGREGAR ANTES, AL NO EXISTIR LAS TABLAS ANTERIORES
        Schema::table('libros', function (Blueprint $table) {
            // FORANEA USER ID
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // FORANEA EDITORIAL ID
            $table->unsignedBigInteger('editorial_id');
            $table->foreign('editorial_id')->references('id')->on('editorials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
