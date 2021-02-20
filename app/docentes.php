<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class docentes extends Model
{
    //
    protected $table="docentes";
	protected $primaryKey = 'id_docente';                 
    protected $fillable=["id_docente", "nombre_docente", "apellidopaterno_docente","apellidomaterno_docente"];

}
