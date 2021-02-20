<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\docentes;
use Session;
class docentecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docente =DB::SELECT("SELECT * FROM docentes WHERE activo_docente = 1");
        return view('docentes.index',compact('docente'));
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
          $events = new docentes;

          $events->nombre_docente = $request->input('nombre_docente');
          $events->apellidomaterno_docente = $request->input('apellidopaterno_docente');
          $events->apellidopaterno_docente = $request->input('apellidomaterno_docente');
          $events->activo_docente = $request->input('activo_docente');

          $events->save();

          return redirect('/docentes')->with('success','Docente Agregado');
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
        $docente = docentes::find($id);
        return view('docentes.edit',compact('docente'));  
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
          $nombre_docente            = $request["nombre_docente"];
          $apellidopaterno_docente   = $request["apellidopaterno_docente"];
          $apellidomaterno_docente   = $request["apellidomaterno_docente"]; 
          $id_docente                = $request["id_docente"]; 

          DB::SELECT("UPDATE docentes SET nombre_docente = '$nombre_docente',apellidopaterno_docente='$apellidopaterno_docente',apellidomaterno_docente='$apellidomaterno_docente'

WHERE id_docente='$id_docente'");
     
          return redirect('/docentes');
    }

    public function desactivar(Request $request)
    {
        //1.- Modificacion  
          $id_docente          = $request["id_docente"]; 

          DB::SELECT("CALL dasactivar_docente('$id_docente')");
     
          return redirect('/docentes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

/*-------------------------------------------------------- Eliminar ------------------------------------------------------------*/
    public function eliminar($id){
        //Funciones
        DB::SELECT("SELECT b_docente($id)");

       return redirect('/docentes')->with('danger','Docente Eliminado');  
        //echo "Resgistro Eliminado";
    }

    public function destroy($id)
    {
        //
    }
}
