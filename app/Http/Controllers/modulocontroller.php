<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\modulo;
use Session; 
use Auth;
class modulocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulo0 =DB::SELECT("SELECT * FROM modulos WHERE activo_modulo = 1");
        return view('modulos.index',compact('modulo0'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function __construct()
    {
    $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1.- Registro Con uso de procedimiento
          $events = new modulo;

          $events->nombre_modulo = $request->input('nombre_modulo');
          $events->activo_modulo = $request->input('activo_modulo');
     
          $events->save();

          return redirect('/modulos')->with('success','Modulo Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modulo0 = modulo::find($id);
        return view('modulos.edit',compact('modulo0'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function update(Request $request)
    {
        //1.- Modificacion 
          $nombre_modulo            = $request["nombre_modulo"];
          $id_modulo                = $request["id_modulo"]; 

          DB::SELECT("UPDATE modulos SET nombre_modulo = '$nombre_modulo' WHERE id_modulo='$id_modulo'");
     
          return redirect('/modulos');
    }




     public function desactivar(Request $request)
    {
        //1.- Modificacion  
          $id_modulo          = $request["id_modulo"]; 

          DB::SELECT("CALL dasactivar_modulo('$id_modulo')");
     
          return redirect('/modulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /*-------------------------------------------------------- Eliminar ------------------------------------------------------------*/
    /*public function eliminar($id){
        //Funciones
        DB::select("SELECT b_modulo($id)");

       return redirect('/modulos')->with('danger','Modulo Eliminado');
       
  
        //echo "Resgistro Eliminado";
    }
    */

    public function destroy($id)
    {
        //
    }
}
