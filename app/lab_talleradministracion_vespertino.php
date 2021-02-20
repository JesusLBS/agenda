<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lab_talleradministracion_vespertino extends Model
{
    //
    protected $table="lab_talleradministracion_vespertinos";
	protected $primaryKey = 'id_lab_talleradmin_ves';                 
    protected $fillable=["id_lab_talleradmin_ves", "codigo_talleradmin_ves", "revision_talleradmin_ves", 
                         "fecha_apro_talleradmin_ves", "pagina_talleradmin_ves", "modulo_id", 
                         "nombreprac_talleradmin_ves","unidad_talleradmin_ves", "desarrollo_talleradmin_ves",  
                         "docente_id", "numalumnos_talleradmin_ves",  "color", 
                         "start_date",  "end_date", "observaciones_talleradmin_ves"];
}
