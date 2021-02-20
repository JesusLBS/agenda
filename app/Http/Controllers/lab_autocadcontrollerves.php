<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\lab_autocad_vespertino;
use Carbon\Carbon;

class lab_autocadcontrollerves extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = lab_autocad_vespertino::all();
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
        return view('autocad_vespertino.index',compact('events','calendar','now','modulo','docente'));
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
 
          $events = new lab_autocad_vespertino;

          $events->title       = $request->input('title');
          $events->color       = $request->input('color');        
          $events->start_date  = $request->input('start_date');
          $events->end_date    = $request->input('end_date');

          $events->codigo_autocad_ves        = $request->input('codigo_autocad_ves'); 
          $events->revision_autocad_ves      = $request->input('revision_autocad_ves'); 
          $events->fecha_apro_autocad_ves    = $request->input('fecha_apro_autocad_ves'); 
          $events->pagina_autocad_ves        = $request->input('pagina_autocad_ves'); 

          $events->modulo_id                 = $request->input('modulo_id'); 
          $events->nombreprac_autocad_ves    = $request->input('nombreprac_autocad_ves'); 
          $events->unidad_autocad_ves        = $request->input('unidad_autocad_ves'); 
          $events->desarrollo_autocad_ves    = $request->input('desarrollo_autocad_ves'); 
          $events->docente_id                = $request->input('docente_id');
          $events->numalumnos_autocad_ves    = $request->input('numalumnos_autocad_ves');
          $events->observaciones_autocad_ves = $request->input('observaciones_autocad_ves');
           
          $events->save();
 
          $pdf = PDF::loadView('pdf.pdfautocadv1', compact('events'));

          $pdf -> setPaper('A4','portrait');
          //stream
          //download

          return $pdf->stream('autocadmatutino.pdf');     
  
     }

     public function store1_(Request $request)
     {

              $events = new lab_autocad_vespertino;

              $events->title       = $request->input('title');
              $events->color       = $request->input('color');        
              $events->start_date  = $request->input('start_date');
              $events->end_date    = $request->input('end_date');

              $events->codigo_autocad_ves        = $request->input('codigo_autocad_ves'); 
              $events->revision_autocad_ves      = $request->input('revision_autocad_ves'); 
              $events->fecha_apro_autocad_ves    = $request->input('fecha_apro_autocad_ves'); 
              $events->pagina_autocad_ves        = $request->input('pagina_autocad_ves'); 

              $events->modulo_id                 = $request->input('modulo_id'); 
              $events->nombreprac_autocad_ves    = $request->input('nombreprac_autocad_ves'); 
              $events->unidad_autocad_ves        = $request->input('unidad_autocad_ves'); 
              $events->desarrollo_autocad_ves    = $request->input('desarrollo_autocad_ves'); 
              $events->docente_id                = $request->input('docente_id');
              $events->numalumnos_autocad_ves    = $request->input('numalumnos_autocad_ves');
              $events->observaciones_autocad_ves = $request->input('observaciones_autocad_ves');
           
              $events->save();  
  
              return redirect('/autocad_vespertino')->with('success','Su registro en el laboratorio ha sido exitoso');
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
        $autocadves1 = DB::SELECT("CALL autocadv_consulta('$crit')"); 
        return view('autocad_vespertino.showinfor',compact('autocadves1'),['criterio'=>$crit] )->with('autocadves1',$autocadves1);
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
        $autocadves1 = lab_autocad_vespertino::find($id);
        return view('autocad_vespertino.edit',compact('autocadves1','modulo','docente'));
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
          $modulo_id        = $request["modulo_id"]; 
          $nombreprac_autocad_ves    = $request["nombreprac_autocad_ves"]; 
          $unidad_autocad_ves        = $request["unidad_autocad_ves"]; 
          $desarrollo_autocad_ves    = $request["desarrollo_autocad_ves"]; 
          $docente_id       = $request["docente_id"];
          $numalumnos_autocad_ves    = $request["numalumnos_autocad_ves"];
          $start_date                = $request["start_date"];
          $end_date                  = $request["end_date"];
          $observaciones_autocad_ves = $request["observaciones_autocad_ves"];
          $id_lab_autocad_ves        = $request["id_lab_autocad_ves"];

          DB::SELECT("CALL modificar_autocadvespertino('$modulo_id','$nombreprac_autocad_ves','$unidad_autocad_ves','$desarrollo_autocad_ves','$docente_id', '$numalumnos_autocad_ves','$start_date','$end_date', '$observaciones_autocad_ves','$id_lab_autocad_ves')");

          return redirect()->route("autocad_vespertino.index");
    }

/*-------------------------------------------------------- Eliminar ------------------------------------------------------------*/
    public function eliminar($id){
        //Funcion
        DB::select("SELECT b_autocadvespertino($id)");

        return redirect()->route("autocad_vespertino.index")->with('danger','Reservación de Laboratorio Eliminada');
       
  
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
