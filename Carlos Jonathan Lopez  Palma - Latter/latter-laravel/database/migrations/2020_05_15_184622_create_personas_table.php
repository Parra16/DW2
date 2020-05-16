<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('ID');
            $table->string('NOMBRE');
            $table->string('APELLIDOPA');
            $table->string('APELLIDOMA');
            $table->date('FECHANA');
            $table->string('SEXO');
            $table->string('CURP');
            $table->string('RFC');
            $table->string('DIRECCION');
            $table->bigInteger('TELEFONO');
            $table->string('EMAIL');
            $table->integer('NSEGURO');
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
        Schema::dropIfExists('personas');
    }
}
