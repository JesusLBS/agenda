<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lab_autocad_vespertino extends Model
{
    //
    protected $table="lab_autocad_vespertinos";
	protected $primaryKey = 'id_lab_autocad_ves';                 
    protected $fillable=["id_lab_autocad_ves", "codigo_autocad_ves", "revision_autocad_ves", 
                         "fecha_apro_autocad_ves", "pagina_autocad_ves", "modulo_id", 
                         "nombreprac_autocad_ves","unidad_autocad_ves", "desarrollo_autocad_ves",  
                         "docente_id", "numalumnos_autocad_ves",  "color", 
                         "start_date",  "end_date", "observaciones_autocad_ves"];
}
