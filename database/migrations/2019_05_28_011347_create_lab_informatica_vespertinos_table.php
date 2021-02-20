<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabInformaticaVespertinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_informatica_vespertinos', function (Blueprint $table) {
            $table->bigIncrements('id_lab_infor_ves');

            $table->string('title');
            $table->string('color');
            $table->datetime('start_date');
            $table->datetime('end_date');

            $table->string('codigo_infor_ves');
            $table->integer('revision_infor_ves');
            $table->string('fecha_apro_infor_ves');
            $table->integer('pagina_infor_ves');

            $table->string('nombreprac_infor_ves');
            $table->string('unidad_infor_ves');
            $table->string('desarrollo_infor_ves');
            $table->integer('numalumnos_infor_ves');
            $table->string('observaciones_infor_ves');

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
        Schema::dropIfExists('lab_informatica_vespertinos');
    }
}
