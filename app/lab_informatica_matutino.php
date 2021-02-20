<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lab_informatica_matutino extends Model
{
    //
    protected $table="lab_informatica_matutinos";
	protected $primaryKey = 'id_lab_infor_mat';                 
    protected $fillable=["id_lab_infor_mat", "codigo_infor_mat", "revision_infor_mat", 
                         "fecha_apro_infor_mat", "pagina_infor_mat", "modulo_id", 
                         "nombreprac_infor_mat","unidad_infor_mat", "desarrollo_infor_mat",  
                         "docente_id", "numalumnos_infor_mat",  "color", 
                         "start_date",  "end_date", "observaciones_infor_mat"];
}

