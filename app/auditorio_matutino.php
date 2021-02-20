<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class auditorio_matutino extends Model
{
    //
    protected $table="auditorio_matutinos";
    protected $primaryKey = 'id_auditorio_mat';                              
    protected $fillable=["id_auditorio_mat", "codigo_auditorio_mat", "revision_auditorio_mat", 
                         "fecha_apro_auditorio_mat", "pagina_auditorio_mat", "modulo_id", 
                         "nombreprac_auditorio_mat","unidad_auditorio_mat", "desarrollo_auditorio_mat",  
                         "docente_id", "numalumnos_auditorio_mat",  "color", 
                         "start_date",  "end_date", "observaciones_auditorio_mat"];

}
