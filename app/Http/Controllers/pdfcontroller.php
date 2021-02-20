<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class pdfcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        //
    } 
    /*---------------------------------------------------------------------------------------------------------------------*/
    //Informatica Matutino
    public function informaticam1_(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $lab1 = DB::SELECT("CALL informaticam_consulta ('$crit')"); 
        $pdf = PDF::loadView('pdf.registrosinformatica0', compact('lab1'));
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('informaticamatutinoREGISTROS.pdf');
    }
    public function informaticam(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $events = DB::SELECT("CALL informaticam_consulta ('$crit')"); 
        $pdf = PDF::loadView('pdf.pdfinformatica0', compact('events')); 
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('informaticamatutino.pdf');
    }
    //Informatica Vespertino 
     public function informaticav1_(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $lab1 = DB::SELECT("CALL informaticav_consulta ('$crit')"); 
        $pdf = PDF::loadView('pdf.registrosinformaticav0', compact('lab1'));
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('informaticavespertinoREGISTROS.pdf');
    }
    public function informaticav(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $events = DB::SELECT("CALL informaticav_consulta ('$crit')"); 
        $pdf = PDF::loadView('pdf.pdfinformaticav0', compact('events')); 
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('informaticavespertino.pdf');
    }

    /*---------------------------------------------------------------------------------------------------------------------*/
    //Autocad Matutino
    public function autocadm1_(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $autocad1 = DB::SELECT("CALL autocadm_consulta ('$crit')"); 
        $pdf = PDF::loadView('pdf.registrosautocad0', compact('autocad1')); 
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('autocadmatutinoREGISTROS.pdf');
    }
    public function autocadm(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $events = DB::SELECT("CALL autocadm_consulta ('$crit')"); 
        $pdf = PDF::loadView('pdf.pdfautocad0', compact('events'));
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('autocadmatutino.pdf');
    }
    //Autocad Vespertino
    public function autocadv1_(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $autocad1 = DB::SELECT("CALL autocadv_consulta ('$crit')"); 
        $pdf = PDF::loadView('pdf.registrosautocadv0', compact('autocad1')); 
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('autocadvespertinoREGISTROS.pdf');
    }
    public function autocadv(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $events = DB::SELECT("CALL autocadv_consulta ('$crit')"); 
        $pdf = PDF::loadView('pdf.pdfautocadv0', compact('events'));
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('autocadvespertino.pdf');
    }

    /*---------------------------------------------------------------------------------------------------------------------*/
    //Taller Administracion Matutino
    public function talleradminm1_(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $admin1 = DB::SELECT("CALL adminm_consulta ('$crit')"); 
        $pdf = PDF::loadView('pdf.registrostalleradmin0', compact('admin1'));
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('talleradministracionmatutinoREGISTROS.pdf');
    }
    public function talleradminm(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $events = DB::SELECT("CALL adminm_consulta ('$crit')"); 
        $pdf = PDF::loadView('pdf.pdftalleradmin0', compact('events'));
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('talleradministracionmatutino.pdf');
    } 
    //Taller Administracion Vespertino
    public function talleradminv1_(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $admin1 = DB::SELECT("CALL adminv_consulta ('$crit')"); 
        $pdf = PDF::loadView('pdf.registrostalleradminv0', compact('admin1'));
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('talleradministracionvespertinoREGISTROS.pdf');
    }
    public function talleradminv(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $events = DB::SELECT("CALL adminv_consulta ('$crit')"); 
        $pdf = PDF::loadView('pdf.pdftalleradminv0', compact('events'));
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('talleradministracionvespertino.pdf');
    }

    /*---------------------------------------------------------------------------------------------------------------------*/
    //Auditorio Matutino
    public function auditoriom1_(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $auditorio1 = DB::SELECT("CALL audim_consulta('$crit')"); 
        $pdf = PDF::loadView('pdf.registrosauditorio0', compact('auditorio1'));
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('auditoriomatutinoREGISTROS.pdf');
    }
    public function auditoriom(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $events = DB::SELECT("CALL audim_consulta('$crit')"); 
        $pdf = PDF::loadView('pdf.pdfauditorio0', compact('events'));
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('auditoriomatutino.pdf');
    }
    //Auditorio Vespertino
    public function auditoriov1_(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $auditorio1 = DB::SELECT("CALL audiv_consulta('$crit')"); 
        $pdf = PDF::loadView('pdf.registrosauditoriov0', compact('auditorio1'));
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('auditoriovespertinoREGISTROS.pdf');
    }
    public function auditoriov(Request $request)
    {   //landscape portrait 
        $crit = $request->criterio;
        $events = DB::SELECT("CALL audiv_consulta('$crit')"); 
        $pdf = PDF::loadView('pdf.pdfauditoriov0', compact('events'));
        $pdf -> setPaper('A4','portrait');

        return $pdf->download('auditoriovespertino.pdf');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
