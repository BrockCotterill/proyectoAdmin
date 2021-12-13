<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('idpuestos')->unsigned();//dice que numeos negativo no se pueden 
            $table->date('fechacontrato')->useCurrent();
            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->string('email', 100)->unique();
            $table->string('telefono', 9)->unique();
            $table->foreign('idpuestos')->references('id')->on('puestos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
