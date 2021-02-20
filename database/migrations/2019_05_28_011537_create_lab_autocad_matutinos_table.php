<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabAutocadMatutinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_autocad_matutinos', function (Blueprint $table) {
            $table->bigIncrements('id_lab_autocad_mat');

            $table->string('title');
            $table->string('color');
            $table->datetime('start_date');
            $table->datetime('end_date');

            $table->string('codigo_autocad_mat');
            $table->integer('revision_autocad_mat');
            $table->string('fecha_apro_autocad_mat');
            $table->integer('pagina_autocad_mat');

            $table->string('nombreprac_autocad_mat');
            $table->string('unidad_autocad_mat');
            $table->string('desarrollo_autocad_mat');
            $table->integer('numalumnos_autocad_mat');
            $table->string('observaciones_autocad_mat');

            $table->unsignedBigInteger('modulo_id')->unsigned();            
            $table->foreign('modulo_id')-> references('id_modulo')-> on('modulos');

            $table->unsignedBigInteger('docente_id')->unsigned();            
            $table->foreign('docente_id')-> references('id_docente')-> on('docentes');

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
        Schema::dropIfExists('lab_autocad_matutinos');
    }
}
