<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\lab_informatica_vespertino;
use Carbon\Carbon;

class lab_informaticacontrollerves extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = lab_informatica_vespertino::all();
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
        return view('/informatica_vespertino.index',compact('events','calendar','now','modulo','docente'));
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
        //
          $events = new lab_informatica_vespertino;

          $events->title       = $request->input('title');
          $events->color       = $request->input('color');        
          $events->start_date  = $request->input('start_date');
          $events->end_date    = $request->input('end_date');

          $events->codigo_infor_ves        = $request->input('codigo_infor_ves'); 
          $events->revision_infor_ves      = $request->input('revision_infor_ves'); 
          $events->fecha_apro_infor_ves    = $request->input('fecha_apro_infor_ves'); 
          $events->pagina_infor_ves        = $request->input('pagina_infor_ves'); 

          $events->modulo_id               = $request->input('modulo_id'); 
          $events->nombreprac_infor_ves    = $request->input('nombreprac_infor_ves'); 
          $events->unidad_infor_ves        = $request->input('unidad_infor_ves'); 
          $events->desarrollo_infor_ves    = $request->input('desarrollo_infor_ves'); 
          $events->docente_id              = $request->input('docente_id');
          $events->numalumnos_infor_ves    = $request->input('numalumnos_infor_ves');
          $events->observaciones_infor_ves = $request->input('observaciones_infor_ves');
          
          $events->save(); 

          $pdf = PDF::loadView('pdf.pdfinformaticav1', compact('events'));

          $pdf -> setPaper('A4','portrait');
          //stream
          //download

          return $pdf->stream('informaticavespertino.pdf');  

    }


    public function store1_(Request $request)
    {
        //1.- Registro Con uso de procedimiento
          $events = new lab_informatica_vespertino;

          $events->title       = $request->input('title');
          $events->color       = $request->input('color');        
          $events->start_date  = $request->input('start_date');
          $events->end_date    = $request->input('end_date');

          $events->codigo_infor_ves        = $request->input('codigo_infor_ves'); 
          $events->revision_infor_ves      = $request->input('revision_infor_ves'); 
          $events->fecha_apro_infor_ves    = $request->input('fecha_apro_infor_ves'); 
          $events->pagina_infor_ves        = $request->input('pagina_infor_ves'); 

          $events->modulo_id               = $request->input('modulo_id'); 
          $events->nombreprac_infor_ves    = $request->input('nombreprac_infor_ves'); 
          $events->unidad_infor_ves        = $request->input('unidad_infor_ves'); 
          $events->desarrollo_infor_ves    = $request->input('desarrollo_infor_ves'); 
          $events->docente_id              = $request->input('docente_id');
          $events->numalumnos_infor_ves    = $request->input('numalumnos_infor_ves');
          $events->observaciones_infor_ves = $request->input('observaciones_infor_ves');
          

          $events->save(); 

          return redirect('/informatica_vespertino')->with('success','Su registro en el laboratorio ha sido exitoso');

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
        $informatica_vespertino1 = DB::SELECT("CALL informaticav_consulta('$crit')");
        return view('informatica_vespertino.showinfor',compact('informatica_vespertino1'),['criterio'=>$crit] )->with('informatica_vespertino1',$informatica_vespertino1);
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
        $informatica_vespertino1 = lab_informatica_vespertino::find($id);
        return view('informatica_vespertino.edit',compact('informatica_vespertino1','modulo','docente')); 
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
          $nombreprac_infor_ves    = $request["nombreprac_infor_ves"]; 
          $unidad_infor_ves        = $request["unidad_infor_ves"]; 
          $desarrollo_infor_ves    = $request["desarrollo_infor_ves"]; 
          $docente_id       = $request["docente_id"];
          $numalumnos_infor_ves    = $request["numalumnos_infor_ves"];
          $start_date              = $request["start_date"];
          $end_date                = $request["end_date"];
          $observaciones_infor_ves = $request["observaciones_infor_ves"];
          $id_lab_infor_ves        = $request["id_lab_infor_ves"];

          DB::SELECT("CALL modificar_informaticavespertino('$modulo_id','$nombreprac_infor_ves','$unidad_infor_ves','$desarrollo_infor_ves','$docente_id', '$numalumnos_infor_ves','$start_date','$end_date', '$observaciones_infor_ves','$id_lab_infor_ves')");
     
          return redirect()->route("informatica_vespertino.index");
    }

    /*-------------------------------------------------------- Eliminar ------------------------------------------------------------*/
    public function eliminar($id){
        //Funciones
        DB::select("SELECT b_informaticavespertino($id)");

        return redirect()->route("informatica_vespertino.index")->with('danger','Reservación de Laboratorio Eliminada');
       
  
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
