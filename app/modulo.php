<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modulo extends Model
{
    //
    protected $table="modulos";
	protected $primaryKey = 'id_modulo';                 
    protected $fillable=["id_modulo", "nombre_modulo"];
}
