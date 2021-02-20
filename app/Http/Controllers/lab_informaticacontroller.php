<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\lab_informatica_matutino;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;

class lab_informaticacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$request->user()->authorizeRoles('admin');
        
        $events = lab_informatica_matutino::all();
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
        return view('/informatica_matutino.index',compact('events','calendar','now','modulo','docente'));
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
        //1.- Registro Con uso de procedimiento
          $events = new lab_informatica_matutino;

          $events->title       = $request->input('title');
          $events->color       = $request->input('color');        
          $events->start_date  = $request->input('start_date');
          $events->end_date    = $request->input('end_date');

          $events->codigo_infor_mat        = $request->input('codigo_infor_mat'); 
          $events->revision_infor_mat      = $request->input('revision_infor_mat'); 
          $events->fecha_apro_infor_mat    = $request->input('fecha_apro_infor_mat'); 
          $events->pagina_infor_mat        = $request->input('pagina_infor_mat'); 

          $events->modulo_id               = $request->input('modulo_id'); 
          $events->nombreprac_infor_mat    = $request->input('nombreprac_infor_mat'); 
          $events->unidad_infor_mat        = $request->input('unidad_infor_mat'); 
          $events->desarrollo_infor_mat    = $request->input('desarrollo_infor_mat'); 
          $events->docente_id              = $request->input('docente_id');
          $events->numalumnos_infor_mat    = $request->input('numalumnos_infor_mat');
          $events->observaciones_infor_mat = $request->input('observaciones_infor_mat');
          
          $events->save(); 

          $pdf = PDF::loadView('pdf.pdfinformatica1', compact('events'));

          $pdf -> setPaper('A4','portrait');
          //stream
          //download

          return $pdf->stream('informaticamatutino.pdf');  

    }


    public function store1_(Request $request)
    {
        //1.- Registro Con uso de procedimiento
          $events = new lab_informatica_matutino;

          $events->title       = $request->input('title');
          $events->color       = $request->input('color');        
          $events->start_date  = $request->input('start_date');
          $events->end_date    = $request->input('end_date');

          $events->codigo_infor_mat        = $request->input('codigo_infor_mat'); 
          $events->revision_infor_mat      = $request->input('revision_infor_mat'); 
          $events->fecha_apro_infor_mat    = $request->input('fecha_apro_infor_mat'); 
          $events->pagina_infor_mat        = $request->input('pagina_infor_mat'); 

          $events->modulo_id               = $request->input('modulo_id'); 
          $events->nombreprac_infor_mat    = $request->input('nombreprac_infor_mat'); 
          $events->unidad_infor_mat        = $request->input('unidad_infor_mat'); 
          $events->desarrollo_infor_mat    = $request->input('desarrollo_infor_mat'); 
          $events->docente_id              = $request->input('docente_id');
          $events->numalumnos_infor_mat    = $request->input('numalumnos_infor_mat');
          $events->observaciones_infor_mat = $request->input('observaciones_infor_mat');
        
          $events->save(); 

          return redirect('/informatica_matutino')->with('success','Su registro en el laboratorio ha sido exitoso');
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
        $lab1 = DB::SELECT("CALL informaticam_consulta('$crit')");
        return view('informatica_matutino.showinfor',compact('lab1'),['criterio'=>$crit] )->with('lab1',$lab1);

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
        $informatica_matutino1 = lab_informatica_matutino::find($id);
        return view('informatica_matutino.edit',compact('informatica_matutino1','modulo','docente')); 
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
          $nombreprac_infor_mat    = $request["nombreprac_infor_mat"]; 
          $unidad_infor_mat        = $request["unidad_infor_mat"]; 
          $desarrollo_infor_mat    = $request["desarrollo_infor_mat"]; 
          $docente_id       = $request["docente_id"];
          $numalumnos_infor_mat    = $request["numalumnos_infor_mat"];
          $start_date              = $request["start_date"];
          $end_date                = $request["end_date"];
          $observaciones_infor_mat = $request["observaciones_infor_mat"];
          $id_lab_infor_mat        = $request["id_lab_infor_mat"];

          DB::SELECT("CALL modificar_informaticamatutino('$modulo_id','$nombreprac_infor_mat','$unidad_infor_mat','$desarrollo_infor_mat','$docente_id', '$numalumnos_infor_mat','$start_date','$end_date', '$observaciones_infor_mat','$id_lab_infor_mat')");
     
          return redirect()->route("informatica_matutino.index");
    }
/*-------------------------------------------------------- Eliminar ------------------------------------------------------------*/
    public function eliminar($id){
        //Funciones
        DB::select("SELECT b_informaticamatutino($id)");

        return redirect()->route("informatica_matutino.index")->with('danger','Reservación de Laboratorio Eliminada');
       
  
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
