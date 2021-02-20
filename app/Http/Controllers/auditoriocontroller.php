<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\auditorio_matutino;
use Carbon\Carbon;
class auditoriocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = auditorio_matutino::all();
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
       return view('auditorio_matutino.index',compact('events','calendar','now','modulo','docente'));
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

          $events = new auditorio_matutino;

          $events->title       = $request->input('title');
          $events->color       = $request->input('color');        
          $events->start_date  = $request->input('start_date');
          $events->end_date    = $request->input('end_date');

          $events->codigo_auditorio_mat        = $request->input('codigo_auditorio_mat'); 
          $events->revision_auditorio_mat      = $request->input('revision_auditorio_mat'); 
          $events->fecha_apro_auditorio_mat    = $request->input('fecha_apro_auditorio_mat'); 
          $events->pagina_auditorio_mat        = $request->input('pagina_auditorio_mat'); 

          $events->modulo_id                   = $request->input('modulo_id'); 
          $events->nombreprac_auditorio_mat    = $request->input('nombreprac_auditorio_mat'); 
          $events->unidad_auditorio_mat        = $request->input('unidad_auditorio_mat'); 
          $events->desarrollo_auditorio_mat    = $request->input('desarrollo_auditorio_mat'); 
          $events->docente_id                  = $request->input('docente_id');
          $events->numalumnos_auditorio_mat    = $request->input('numalumnos_auditorio_mat');
          $events->observaciones_auditorio_mat = $request->input('observaciones_auditorio_mat');
           
          $events->save();
 
          $pdf = PDF::loadView('pdf.pdfauditorio1', compact('events'));

          $pdf -> setPaper('A4','portrait');
          //stream
          //download

          return $pdf->stream('auditoriomatutino.pdf');     
  
     }

     public function store1_(Request $request)
        {

              $events = new auditorio_matutino;

              $events->title       = $request->input('title');
              $events->color       = $request->input('color');        
              $events->start_date  = $request->input('start_date');
              $events->end_date    = $request->input('end_date');

              $events->codigo_auditorio_mat        = $request->input('codigo_auditorio_mat'); 
              $events->revision_auditorio_mat      = $request->input('revision_auditorio_mat'); 
              $events->fecha_apro_auditorio_mat    = $request->input('fecha_apro_auditorio_mat'); 
              $events->pagina_auditorio_mat        = $request->input('pagina_auditorio_mat'); 

              $events->modulo_id                   = $request->input('modulo_id'); 
              $events->nombreprac_auditorio_mat    = $request->input('nombreprac_auditorio_mat'); 
              $events->unidad_auditorio_mat        = $request->input('unidad_auditorio_mat'); 
              $events->desarrollo_auditorio_mat    = $request->input('desarrollo_auditorio_mat'); 
              $events->docente_id                  = $request->input('docente_id');
              $events->numalumnos_auditorio_mat    = $request->input('numalumnos_auditorio_mat');
              $events->observaciones_auditorio_mat = $request->input('observaciones_auditorio_mat');
           
              $events->save();  
  
              return redirect('/auditorio_matutino')->with('success','Su registro en el laboratorio ha sido exitoso');

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
        $auditorio1 = DB::SELECT("CALL audim_consulta('$crit')"); 
         
        return view('auditorio_matutino.showinfor',compact('auditorio1'),['criterio'=>$crit] )->with('auditorio1',$auditorio1);
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
        $auditorio1 = auditorio_matutino::find($id);
        return view('auditorio_matutino.edit',compact('auditorio1','modulo','docente')); 
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
        $modulo_id         = $request["modulo_id"]; 
        $nombreprac_auditorio_mat     = $request["nombreprac_auditorio_mat"]; 
        $unidad_auditorio_mat         = $request["unidad_auditorio_mat"]; 
        $desarrollo_auditorio_mat     = $request["desarrollo_auditorio_mat"]; 
        $docente_id        =  $request["docente_id"];
        $numalumnos_auditorio_mat     = $request["numalumnos_auditorio_mat"];
        $start_date                   = $request["start_date"];
        $end_date                     = $request["end_date"];
        $observaciones_auditorio_mat  = $request["observaciones_auditorio_mat"];
        $id_auditorio_mat             = $request["id_auditorio_mat"];

        DB::SELECT("CALL modificar_auditoriomatutino('$modulo_id','$nombreprac_auditorio_mat','$unidad_auditorio_mat','$desarrollo_auditorio_mat','$docente_id', '$numalumnos_auditorio_mat','$start_date','$end_date', '$observaciones_auditorio_mat','$id_auditorio_mat')");
     
        return redirect('/auditorio_matutino');
    }

/*-------------------------------------------------------- Eliminar ------------------------------------------------------------*/
    public function eliminar($id){
        //Funciones
        DB::select("SELECT b_auditoriomatutino($id)");

        return redirect()->route("auditorio_matutino.index")->with('danger','Reservación de Laboratorio Eliminada');
       
  
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

