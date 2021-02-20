<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\lab_talleradministracion_vespertino;
use Carbon\Carbon;

class taller_administracioncontrollerves extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = lab_talleradministracion_vespertino::all();
        $event = [];

        foreach ($events as $row) {
            $enddate = $row->end_date."24:00:00";
            $event[] = \Calendar::event(
                $row->title,
                false,
                $row->start_date,
                $row->end_date, 
                $row->id,
                [

                    'color' =>$row->color,
                    
                ]
            );
        }
        $modulo =DB::SELECT("SELECT * FROM modulos WHERE activo_modulo = 1");
        $docente =DB::SELECT("SELECT * FROM docentes WHERE activo_docente = 1");
        $now =Carbon::now(); 
        $calendar = \Calendar::addEvents($event); 
        return view('talleradministracionvespertino.index',compact('events','calendar','now','modulo','docente'));
    }

    public function __construct()
    {
    $this->middleware('auth');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        //1.- 
          $events = new lab_talleradministracion_vespertino;

          $events->title       = $request->input('title');
          $events->color       = $request->input('color');        
          $events->start_date  = $request->input('start_date');
          $events->end_date    = $request->input('end_date');

          $events->codigo_talleradmin_ves        = $request->input('codigo_talleradmin_ves'); 
          $events->revision_talleradmin_ves      = $request->input('revision_talleradmin_ves'); 
          $events->fecha_apro_talleradmin_ves    = $request->input('fecha_apro_talleradmin_ves'); 
          $events->pagina_talleradmin_ves        = $request->input('pagina_talleradmin_ves'); 

          $events->modulo_id                     = $request->input('modulo_id'); 
          $events->nombreprac_talleradmin_ves    = $request->input('nombreprac_talleradmin_ves'); 
          $events->unidad_talleradmin_ves        = $request->input('unidad_talleradmin_ves'); 
          $events->desarrollo_talleradmin_ves    = $request->input('desarrollo_talleradmin_ves'); 
          $events->docente_id                    = $request->input('docente_id');
          $events->numalumnos_talleradmin_ves    = $request->input('numalumnos_talleradmin_ves');
          $events->observaciones_talleradmin_ves = $request->input('observaciones_talleradmin_ves');
          
          $events->save();  

          $pdf = PDF::loadView('pdf.pdftalleradminv1', compact('events'));

          $pdf -> setPaper('A4','portrait');
          //stream
          //download

          return $pdf->stream('talleradministracionvespertino.pdf');  

    }

    public function store1_(Request $request)
    {

          $events = new lab_talleradministracion_vespertino;

          $events->title       = $request->input('title');
          $events->color       = $request->input('color');        
          $events->start_date  = $request->input('start_date');
          $events->end_date    = $request->input('end_date');

          $events->codigo_talleradmin_ves        = $request->input('codigo_talleradmin_ves'); 
          $events->revision_talleradmin_ves      = $request->input('revision_talleradmin_ves'); 
          $events->fecha_apro_talleradmin_ves    = $request->input('fecha_apro_talleradmin_ves'); 
          $events->pagina_talleradmin_ves        = $request->input('pagina_talleradmin_ves'); 

          $events->modulo_id                     = $request->input('modulo_id'); 
          $events->nombreprac_talleradmin_ves    = $request->input('nombreprac_talleradmin_ves'); 
          $events->unidad_talleradmin_ves        = $request->input('unidad_talleradmin_ves'); 
          $events->desarrollo_talleradmin_ves    = $request->input('desarrollo_talleradmin_ves'); 
          $events->docente_id                    = $request->input('docente_id');
          $events->numalumnos_talleradmin_ves    = $request->input('numalumnos_talleradmin_ves');
          $events->observaciones_talleradmin_ves = $request->input('observaciones_talleradmin_ves');
          
          $events->save();
             
          return redirect('/taller_admin_vespertino')->with('success','Su registro en el laboratorio ha sido exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $crit = $request['criterio'];
        $adminves1 = DB::SELECT("CALL adminv_consulta('$crit')"); 
        return view('talleradministracionvespertino.showinfor',compact('adminves1'),['criterio'=>$crit] )->with('adminves1',$adminves1);
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modulo =DB::SELECT("SELECT * FROM modulos WHERE activo_modulo = 1");
        $docente =DB::SELECT("SELECT * FROM docentes WHERE activo_docente = 1"); 
        $adminves1 = lab_talleradministracion_vespertino::find($id);
        return view('talleradministracionvespertino.edit',compact('adminves1','modulo','docente')); 
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
          $modulo_id                     = $request["modulo_id"]; 
          $nombreprac_talleradmin_ves    = $request["nombreprac_talleradmin_ves"]; 
          $unidad_talleradmin_ves        = $request["unidad_talleradmin_ves"]; 
          $desarrollo_talleradmin_ves    = $request["desarrollo_talleradmin_ves"]; 
          $docente_id                    = $request["docente_id"];
          $numalumnos_talleradmin_ves    = $request["numalumnos_talleradmin_ves"];
          $start_date                    = $request["start_date"];
          $end_date                      = $request["end_date"];
          $observaciones_talleradmin_ves = $request["observaciones_talleradmin_ves"];
          $id_lab_talleradmin_ves        = $request["id_lab_talleradmin_ves"];

          DB::SELECT("CALL modificar_talleradminvespertino('$modulo_id','$nombreprac_talleradmin_ves','$unidad_talleradmin_ves','$desarrollo_talleradmin_ves','$docente_id', '$numalumnos_talleradmin_ves','$start_date','$end_date', '$observaciones_talleradmin_ves','$id_lab_talleradmin_ves')");
     
          return redirect('/taller_admin_vespertino');
    }
/*-------------------------------------------------------- Eliminar ------------------------------------------------------------*/
    public function eliminar($id){
        //Funciones
        DB::select("SELECT b_talleradminvespertino($id)");

       return redirect('/taller_admin_vespertino')->with('danger','Reservación de Laboratorio Eliminada');
       
  
        //echo "Resgistro Eliminado";
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
