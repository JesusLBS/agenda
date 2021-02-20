<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lab_talleradministracion_matutino extends Model
{
    //
    protected $table="lab_talleradministracion_matutinos";
	protected $primaryKey = 'id_lab_talleradmin_mat';                 
    protected $fillable=["id_lab_talleradmin_mat", "codigo_talleradmin_mat", "revision_talleradmin_mat", 
                         "fecha_apro_talleradmin_mat", "pagina_talleradmin_mat", "modulo_id", 
                         "nombreprac_talleradmin_mat","unidad_talleradmin_mat", "desarrollo_talleradmin_mat",  
                         "docente_id", "numalumnos_talleradmin_mat",  "color", 
                         "start_date",  "end_date", "observaciones_talleradmin_mat"];
}
