<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditorioMatutinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditorio_matutinos', function (Blueprint $table) {
            $table->bigIncrements('id_auditorio_mat');
            
            $table->string('title');
            $table->string('color');
            $table->datetime('start_date');
            $table->datetime('end_date');

            $table->string('codigo_auditorio_mat');
            $table->integer('revision_auditorio_mat');
            $table->string('fecha_apro_auditorio_mat');
            $table->integer('pagina_auditorio_mat');

            $table->string('nombreprac_auditorio_mat');
            $table->string('unidad_auditorio_mat');
            $table->string('desarrollo_auditorio_mat');
            $table->integer('numalumnos_auditorio_mat'); 
            $table->string('observaciones_auditorio_mat');

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
        Schema::dropIfExists('auditorio_matutinos');
    }
}
