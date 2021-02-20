<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\auditorio_vespertino;
use Carbon\Carbon;

class auditoriocontrollerves extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = auditorio_vespertino::all();
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
        return view('auditorio_vespertino.index',compact('events','calendar','now','modulo','docente'));
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

          $events = new auditorio_vespertino;

          $events->title       = $request->input('title');
          $events->color       = $request->input('color');        
          $events->start_date  = $request->input('start_date');
          $events->end_date    = $request->input('end_date');

          $events->codigo_auditorio_ves        = $request->input('codigo_auditorio_ves'); 
          $events->revision_auditorio_ves      = $request->input('revision_auditorio_ves'); 
          $events->fecha_apro_auditorio_ves    = $request->input('fecha_apro_auditorio_ves'); 
          $events->pagina_auditorio_ves        = $request->input('pagina_auditorio_ves'); 

          $events->modulo_id                   = $request->input('modulo_id'); 
          $events->nombreprac_auditorio_ves    = $request->input('nombreprac_auditorio_ves'); 
          $events->unidad_auditorio_ves        = $request->input('unidad_auditorio_ves'); 
          $events->desarrollo_auditorio_ves    = $request->input('desarrollo_auditorio_ves'); 
          $events->docente_id                  = $request->input('docente_id');
          $events->numalumnos_auditorio_ves    = $request->input('numalumnos_auditorio_ves');
          $events->observaciones_auditorio_ves = $request->input('observaciones_auditorio_ves');
           
          $events->save();
 
          $pdf = PDF::loadView('pdf.pdfauditoriov1', compact('events'));

          $pdf -> setPaper('A4','portrait');
          //stream
          //download

          return $pdf->stream('auditoriovespertino.pdf');     
  
     }

     public function store1_(Request $request)
        {

              $events = new auditorio_vespertino;

              $events->title       = $request->input('title');
              $events->color       = $request->input('color');        
              $events->start_date  = $request->input('start_date');
              $events->end_date    = $request->input('end_date');

              $events->codigo_auditorio_ves        = $request->input('codigo_auditorio_ves'); 
              $events->revision_auditorio_ves      = $request->input('revision_auditorio_ves'); 
              $events->fecha_apro_auditorio_ves    = $request->input('fecha_apro_auditorio_ves'); 
              $events->pagina_auditorio_ves        = $request->input('pagina_auditorio_ves'); 

              $events->modulo_id                   = $request->input('modulo_id'); 
              $events->nombreprac_auditorio_ves    = $request->input('nombreprac_auditorio_ves'); 
              $events->unidad_auditorio_ves        = $request->input('unidad_auditorio_ves'); 
              $events->desarrollo_auditorio_ves    = $request->input('desarrollo_auditorio_ves'); 
              $events->docente_id                  = $request->input('docente_id');
              $events->numalumnos_auditorio_ves    = $request->input('numalumnos_auditorio_ves');
              $events->observaciones_auditorio_ves = $request->input('observaciones_auditorio_ves');
           
              $events->save();  
  
              return redirect('/auditorio_vespertino')->with('success','Su registro en el laboratorio ha sido exitoso');
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
        $auditorioves1 = DB::SELECT("CALL audiv_consulta('$crit')"); 
        
        return view('auditorio_vespertino.showinfor',compact('auditorioves1'),['criterio'=>$crit] )->with('auditorioves1',$auditorioves1);
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
        $auditorioves1 = auditorio_vespertino::find($id);
        return view('auditorio_vespertino.edit',compact('auditorioves1','modulo','docente')); 
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
          $modulo_id                    = $request["modulo_id"]; 
          $nombreprac_auditorio_ves     = $request["nombreprac_auditorio_ves"]; 
          $unidad_auditorio_ves         = $request["unidad_auditorio_ves"]; 
          $desarrollo_auditorio_ves     = $request["desarrollo_auditorio_ves"]; 
          $docente_id                   = $request["docente_id"];
          $numalumnos_auditorio_ves     = $request["numalumnos_auditorio_ves"];
          $start_date                   = $request["start_date"];
          $end_date                     = $request["end_date"];
          $observaciones_auditorio_ves  = $request["observaciones_auditorio_ves"];
          $id_auditorio_ves             = $request["id_auditorio_ves"];

          DB::SELECT("CALL modificar_auditoriovespertino('$modulo_id','$nombreprac_auditorio_ves','$unidad_auditorio_ves','$desarrollo_auditorio_ves','$docente_id', '$numalumnos_auditorio_ves','$start_date','$end_date', '$observaciones_auditorio_ves','$id_auditorio_ves')");
     
          return redirect('/auditorio_vespertino');
    }
/*-------------------------------------------------------- Eliminar ------------------------------------------------------------*/
    public function eliminar($id){
        //Funciones
        DB::select("SELECT b_auditoriovespertino($id)");

        return redirect()->route("auditorio_vespertino.index")->with('danger','Reservación de Laboratorio Eliminada');
       
  
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
