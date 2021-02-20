<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Mail;
use Session;
class administrador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function __construct()
    {
    $this->middleware('auth');
    }
    */
    public function index()
    {
             
        $lab1 = DB::select("CALL consulta_informatica_mat()");
        return view('administrador.informatica')->with('lab1',$lab1);
    }
     public function index2()
    {

        return view('auth.registeradmin');
    }






    public function __construct()
    {
        $this->middleware('auth');
    }

    public function actualizaragenda()
    {
          DB::SELECT("CALL update_agenda()");
          return redirect()->to('/agenda_inicio')->with('update','Actualización Realizada Satisfactoriamente');
          //echo "Actulicación Exitosa";;
    }

      public function activacion()
    {
          
          return view('activacion');
          //echo "Exito";;
    }



    public function store1(Request $request)
    {
        $user = $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'active_id' => ['required','integer'],
            'role_id' => ['required','integer'],
        ]);
        
        $user = User::create(request(['name', 'email', 'password','active_id','role_id']));
        

        $user['name']=$request['name'];
        $user['email']=$request['email'];


        Mail::send('email.mensajeadmin',['user'=>$user],
        function($m) use($user){
            $m->to('al221710026@gmail.com')
            ->subject('Usuario nuevo en Agenda Electronica');
            
        });
  
  
        return redirect()->to('/admin_users')->with('activ_','Registro Exitoso ');
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
