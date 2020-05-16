<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->integer('IDPERSONA');
            $table->date('FECHA');
            $table->time('HORA');
            $table->string('DESCRIPCION');
            $table->decimal('MONTO',6,2);
            $table->index(['IDPERSONA','FECHA','DESCRIPCION']);
            $table->foreign('IDPERSONA')->references('ID')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
