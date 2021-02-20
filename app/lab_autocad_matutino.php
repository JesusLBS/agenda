<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lab_autocad_matutino extends Model
{
    //
    protected $table="lab_autocad_matutinos";
	protected $primaryKey = 'id_lab_autocad_mat';                 
    protected $fillable=["id_lab_autocad_mat", "codigo_autocad_mat", "revision_autocad_mat", 
                         "fecha_apro_autocad_mat", "pagina_autocad_mat", "modulo_id", 
                         "nombreprac_autocad_mat","unidad_autocad_mat", "desarrollo_autocad_mat",  
                         "docente_id", "numalumnos_autocad_mat",  "color", 
                         "start_date",  "end_date", "observaciones_autocad_mat"];
}
