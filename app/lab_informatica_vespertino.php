<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lab_informatica_vespertino extends Model
{
    //
    protected $table="lab_informatica_vespertinos";
    protected $primaryKey = 'id_lab_infor_ves';                             
    protected $fillable=["id_lab_infor_ves", "codigo_infor_ves", "revision_infor_ves", 
                         "fecha_apro_infor_ves", "pagina_infor_ves", "modulo_id", 
                         "nombreprac_infor_ves","unidad_infor_ves", "desarrollo_infor_ves",  
                         "docente_id", "numalumnos_infor_ves",  "color", 
                         "start_date",  "end_date", "observaciones_infor_ves"];
}
