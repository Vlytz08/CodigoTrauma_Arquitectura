<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateEmergenciasTable extends Migration
{
    public function up()
    {
        Schema::create('emergencias', function (Blueprint $table) {
            $table->id('id_emergencia');
            $table->string('detalle');
            $table->integer('cantidad_pacientes');
            $table->date('fecha')->default(now());
            $table->time('hora')->default(now());
            $table->boolean('estado')->default(true);
        });
    }

    public function down()
    {
        Schema::dropIfExists('emergencias');
    }
}