<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id('id_paciente');
            $table->string('nombre');
            $table->string('apellidom');
            $table->string('apellidop');
            $table->integer('edad')->nullable();
            $table->unsignedBigInteger('id_emergencia')->nullable();
            $table->unsignedBigInteger('id_doctor'); 
            $table->foreign('id_emergencia')->references('id_emergencia')->on('emergencias');
            $table->foreign('id_doctor')->references('id_doctor')->on('doctores'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}