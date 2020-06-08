<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('codigo_convocatoria');
            $table->string('codigo_concurso');
            $table->string('periodo');
            $table->string('nom_archivo');
            $table->string('ubi_archivo');
            $table->integer('id_tipo');
            $table->boolean('vigente');
            $table->boolean('calificada');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->date('fecha_resultado');
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
        Schema::drop('calls');
    }
}
