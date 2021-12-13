<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('empleados', function (Blueprint $table) {//AQUI CREAMOS UNAS NUEVAS COLUMNAS UNA VEZ QUE YA ESTAN CREADAS LAS TABLAS, PARA ASIGNAR LA CLAVE FORANEA DE IDJEFEDEPARTAMENTO
           //EL Schema::table sirve para añadir tablas 
             $table->bigInteger('iddepartamentos')->unsigned();

             $table->foreign('iddepartamentos')->references('id')->on('departamentos')->onDelete('cascade');
        });  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            //
        });
    }
}
