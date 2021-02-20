<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class auditorio_vespertino extends Model
{
    //
    protected $table="auditorio_vespertinos";
    protected $primaryKey = 'id_auditorio_ves';                              
    protected $fillable=["id_auditorio_ves", "codigo_auditorio_ves", "revision_auditorio_ves", 
                         "fecha_apro_auditorio_ves", "pagina_auditorio_ves", "modulo_id", 
                         "nombreprac_auditorio_ves","unidad_auditorio_ves", "desarrollo_auditorio_ves",  
                         "docente_id", "numalumnos_auditorio_ves",  "color", 
                         "start_date",  "end_date", "observaciones_auditorio_ves"];
}
