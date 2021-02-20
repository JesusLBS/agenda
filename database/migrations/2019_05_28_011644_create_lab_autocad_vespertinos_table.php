<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabAutocadVespertinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_autocad_vespertinos', function (Blueprint $table) {
            $table->bigIncrements('id_lab_autocad_ves');

            $table->string('title');
            $table->string('color');
            $table->datetime('start_date');
            $table->datetime('end_date');

            $table->string('codigo_autocad_ves');
            $table->integer('revision_autocad_ves');
            $table->string('fecha_apro_autocad_ves');
            $table->integer('pagina_autocad_ves');

            $table->string('nombreprac_autocad_ves');
            $table->string('unidad_autocad_ves');
            $table->string('desarrollo_autocad_ves');
            $table->integer('numalumnos_autocad_ves');
            $table->string('observaciones_autocad_ves');

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
        Schema::dropIfExists('lab_autocad_vespertinos');
    }
}
