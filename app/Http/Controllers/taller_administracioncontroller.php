<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\lab_talleradministracion_matutino;
use Carbon\Carbon;

class taller_administracioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = lab_talleradministracion_matutino::all();
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
        return view('talleradministracionmatutino.index',compact('events','calendar','now','modulo','docente'));
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
          $events = new lab_talleradministracion_matutino;

          $events->title       = $request->input('title');
          $events->color       = $request->input('color');        
          $events->start_date  = $request->input('start_date');
          $events->end_date    = $request->input('end_date');

          $events->codigo_talleradmin_mat        = $request->input('codigo_talleradmin_mat'); 
          $events->revision_talleradmin_mat      = $request->input('revision_talleradmin_mat'); 
          $events->fecha_apro_talleradmin_mat    = $request->input('fecha_apro_talleradmin_mat'); 
          $events->pagina_talleradmin_mat        = $request->input('pagina_talleradmin_mat'); 

          $events->modulo_id                     = $request->input('modulo_id'); 
          $events->nombreprac_talleradmin_mat    = $request->input('nombreprac_talleradmin_mat'); 
          $events->unidad_talleradmin_mat        = $request->input('unidad_talleradmin_mat'); 
          $events->desarrollo_talleradmin_mat    = $request->input('desarrollo_talleradmin_mat'); 
          $events->docente_id                    = $request->input('docente_id');
          $events->numalumnos_talleradmin_mat    = $request->input('numalumnos_talleradmin_mat');
          $events->observaciones_talleradmin_mat = $request->input('observaciones_talleradmin_mat');
          
          $events->save();  

          $pdf = PDF::loadView('pdf.pdftalleradmin1', compact('events'));

          $pdf -> setPaper('A4','portrait');
          //stream
          //download

          return $pdf->stream('talleradministracionmatutino.pdf');  

    }

    public function store1_(Request $request)
    {

          $events = new lab_talleradministracion_matutino;

          $events->title       = $request->input('title');
          $events->color       = $request->input('color');        
          $events->start_date  = $request->input('start_date');
          $events->end_date    = $request->input('end_date');

          $events->codigo_talleradmin_mat        = $request->input('codigo_talleradmin_mat'); 
          $events->revision_talleradmin_mat      = $request->input('revision_talleradmin_mat'); 
          $events->fecha_apro_talleradmin_mat    = $request->input('fecha_apro_talleradmin_mat'); 
          $events->pagina_talleradmin_mat        = $request->input('pagina_talleradmin_mat'); 

          $events->modulo_id                     = $request->input('modulo_id'); 
          $events->nombreprac_talleradmin_mat    = $request->input('nombreprac_talleradmin_mat'); 
          $events->unidad_talleradmin_mat        = $request->input('unidad_talleradmin_mat'); 
          $events->desarrollo_talleradmin_mat    = $request->input('desarrollo_talleradmin_mat'); 
          $events->docente_id                    = $request->input('docente_id');
          $events->numalumnos_talleradmin_mat    = $request->input('numalumnos_talleradmin_mat');
          $events->observaciones_talleradmin_mat = $request->input('observaciones_talleradmin_mat');
          
          $events->save();
             
          return redirect('/taller_admin_matutino')->with('success','Su registro en el laboratorio ha sido exitoso');
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
        $admin1 = DB::SELECT("CALL adminm_consulta('$crit')"); 
        return view('talleradministracionmatutino.showinfor',compact('admin1'),['criterio'=>$crit] )->with('admin1',$admin1);
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
        $admin1 = lab_talleradministracion_matutino::find($id);
        return view('talleradministracionmatutino.edit',compact('admin1','modulo','docente')); 
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
          $nombreprac_talleradmin_mat    = $request["nombreprac_talleradmin_mat"]; 
          $unidad_talleradmin_mat        = $request["unidad_talleradmin_mat"]; 
          $desarrollo_talleradmin_mat    = $request["desarrollo_talleradmin_mat"]; 
          $docente_id       = $request["docente_id"];
          $numalumnos_talleradmin_mat    = $request["numalumnos_talleradmin_mat"];
          $start_date                     = $request["start_date"];
          $end_date                       = $request["end_date"];
          $observaciones_talleradmin_mat = $request["observaciones_talleradmin_mat"];
          $id_lab_talleradmin_mat        = $request["id_lab_talleradmin_mat"];

          DB::SELECT("CALL modificar_talleradminmatutino('$modulo_id','$nombreprac_talleradmin_mat','$unidad_talleradmin_mat','$desarrollo_talleradmin_mat','$docente_id', '$numalumnos_talleradmin_mat','$start_date','$end_date', '$observaciones_talleradmin_mat','$id_lab_talleradmin_mat')");
     
          return redirect('/taller_admin_matutino');
    }
/*-------------------------------------------------------- Eliminar ------------------------------------------------------------*/
    public function eliminar($id){
        //Funciones
        DB::select("SELECT b_talleradminmatutino($id)");

       return redirect('/taller_admin_matutino')->with('danger','Reservación de Laboratorio Eliminada');
       
  
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
