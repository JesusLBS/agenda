<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabInformaticaMatutinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('lab_informatica_matutinos', function (Blueprint $table) {
            $table-> engine = 'InnoDB';

            $table->bigIncrements('id_lab_infor_mat');

            $table->string('title');
            $table->string('color');
            $table->datetime('start_date');
            $table->datetime('end_date');
            
            $table->string('codigo_infor_mat');
            $table->integer('revision_infor_mat');
            $table->string('fecha_apro_infor_mat');
            $table->integer('pagina_infor_mat');
            
            $table->string('nombreprac_infor_mat');
            $table->string('unidad_infor_mat');
            $table->string('desarrollo_infor_mat');
            $table->integer('numalumnos_infor_mat');           
            $table->string('observaciones_infor_mat');

            $table->unsignedBigInteger('modulo_id')->unsigned();            
            $table->foreign('modulo_id')-> references('id_modulo')-> on('modulos');

            $table->unsignedBigInteger('docente_id')->unsigned();            
            $table->foreign('docente_id')-> references('id_docente')-> on('docentes');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *->onDelete('cascade')
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_informatica_matutinos');
    }
}
