<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\lab_autocad_matutino;
use Mail;
use Carbon\Carbon;

class lab_autocadcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = lab_autocad_matutino::all();
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
        return view('autocad_matutino.index',compact('events','calendar','now','modulo','docente'));
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
 
          $events = new lab_autocad_matutino;

          $events->title       = $request->input('title');
          $events->color       = $request->input('color');        
          $events->start_date  = $request->input('start_date');
          $events->end_date    = $request->input('end_date');

          $events->codigo_autocad_mat        = $request->input('codigo_autocad_mat'); 
          $events->revision_autocad_mat      = $request->input('revision_autocad_mat'); 
          $events->fecha_apro_autocad_mat    = $request->input('fecha_apro_autocad_mat'); 
          $events->pagina_autocad_mat        = $request->input('pagina_autocad_mat'); 

          $events->modulo_id                 = $request->input('modulo_id'); 
          $events->nombreprac_autocad_mat    = $request->input('nombreprac_autocad_mat'); 
          $events->unidad_autocad_mat        = $request->input('unidad_autocad_mat'); 
          $events->desarrollo_autocad_mat    = $request->input('desarrollo_autocad_mat'); 
          $events->docente_id                = $request->input('docente_id');
          $events->numalumnos_autocad_mat    = $request->input('numalumnos_autocad_mat');
          $events->observaciones_autocad_mat = $request->input('observaciones_autocad_mat');
           
          $events->save();
 
          $pdf = PDF::loadView('pdf.pdfautocad1', compact('events'));

          $pdf -> setPaper('A4','portrait');
          //stream
          //download

          return $pdf->stream('autocadmatutino.pdf');     
  
     }

     public function store1_(Request $request)
        {

              $events = new lab_autocad_matutino;

              $events->title       = $request->input('title');
              $events->color       = $request->input('color');        
              $events->start_date  = $request->input('start_date');
              $events->end_date    = $request->input('end_date');

              $events->codigo_autocad_mat        = $request->input('codigo_autocad_mat'); 
              $events->revision_autocad_mat      = $request->input('revision_autocad_mat'); 
              $events->fecha_apro_autocad_mat    = $request->input('fecha_apro_autocad_mat'); 
              $events->pagina_autocad_mat        = $request->input('pagina_autocad_mat'); 

              $events->modulo_id                 = $request->input('modulo_id'); 
              $events->nombreprac_autocad_mat    = $request->input('nombreprac_autocad_mat'); 
              $events->unidad_autocad_mat        = $request->input('unidad_autocad_mat'); 
              $events->desarrollo_autocad_mat    = $request->input('desarrollo_autocad_mat'); 
              $events->docente_id                = $request->input('docente_id');
              $events->numalumnos_autocad_mat    = $request->input('numalumnos_autocad_mat');
              $events->observaciones_autocad_mat = $request->input('observaciones_autocad_mat');
           
              $events->save();  
  
              return redirect('/autocad_matutino')->with('success','Su registro en el laboratorio ha sido exitoso');


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
        $autocad1 = DB::SELECT("CALL autocadm_consulta('$crit')"); 
        return view('autocad_matutino.showinfor',compact('autocad1'),['criterio'=>$crit] )->with('autocad1',$autocad1);
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
       $autocad_matutino1 = lab_autocad_matutino::find($id);
       return view('autocad_matutino.edit',compact('autocad_matutino1','modulo','docente')); 
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
          $modulo_id                 = $request["modulo_id"]; 
          $nombreprac_autocad_mat    = $request["nombreprac_autocad_mat"]; 
          $unidad_autocad_mat        = $request["unidad_autocad_mat"]; 
          $desarrollo_autocad_mat    = $request["desarrollo_autocad_mat"]; 
          $docente_id                = $request["docente_id"];
          $numalumnos_autocad_mat    = $request["numalumnos_autocad_mat"];
          $start_date                = $request["start_date"];
          $end_date                  = $request["end_date"];
          $observaciones_autocad_mat = $request["observaciones_autocad_mat"];
          $id_lab_autocad_mat        = $request["id_lab_autocad_mat"];

          DB::SELECT("CALL modificar_autocadmatutino('$modulo_id','$nombreprac_autocad_mat','$unidad_autocad_mat','$desarrollo_autocad_mat','$docente_id', '$numalumnos_autocad_mat','$start_date','$end_date', '$observaciones_autocad_mat','$id_lab_autocad_mat')");

          return redirect()->route("autocad_matutino.index");
    }
/*-------------------------------------------------------- Eliminar ------------------------------------------------------------*/
    public function eliminar($id){
        //Funcion
        DB::select("SELECT b_autocadmatutino($id)");

        return redirect()->route("autocad_matutino.index")->with('danger','Reservación de Laboratorio Eliminada');
       
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
