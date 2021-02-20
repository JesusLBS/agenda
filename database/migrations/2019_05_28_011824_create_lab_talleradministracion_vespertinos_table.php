<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabTalleradministracionVespertinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_talleradministracion_vespertinos', function (Blueprint $table) {
            $table->bigIncrements('id_lab_talleradmin_ves');

            $table->string('title');
            $table->string('color');
            $table->datetime('start_date');
            $table->datetime('end_date');

            $table->string('codigo_talleradmin_ves');
            $table->integer('revision_talleradmin_ves');
            $table->string('fecha_apro_talleradmin_ves');
            $table->integer('pagina_talleradmin_ves');

            $table->string('nombreprac_talleradmin_ves');
            $table->string('unidad_talleradmin_ves');
            $table->string('desarrollo_talleradmin_ves');
            $table->integer('numalumnos_talleradmin_ves');
            $table->string('observaciones_talleradmin_ves');

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
        Schema::dropIfExists('lab_talleradministracion_vespertinos');
    }
}
