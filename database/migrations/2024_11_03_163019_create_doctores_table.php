<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctoresTable extends Migration
{
    public function up()
    {
        Schema::create('doctores', function (Blueprint $table) {
            $table->bigIncrements('id_doctor');
            $table->string('nombre', 50);
            $table->integer('edad')->nullable();
            $table->string('especialidad', 50); 
            $table->boolean('estado')->default(true); 
            $table->string('correo', 100)->nullable();
            $table->string('celular', 15)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctores');
    }
}
