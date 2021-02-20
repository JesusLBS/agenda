<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;


class usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::SELECT("SELECT * FROM users WHERE active_id = 0 ");
        return view('administrador.users')->with('user',$user);
    }

    public function index2()
    {
        $user = DB::SELECT("SELECT * FROM users where active_id =1");
        return view('administrador.users2')->with('user',$user);
    }

     
    public function __construct()
    {
    $this->middleware('auth');
    }
    

    public function activaruser(Request $request)
    {
          //1.- Activar User  
          $id       = $request["id"]; 
          
          DB::SELECT("CALL activar_user('$id')");
          
     
          return redirect('/admin_users')->with('activ','Cuenta del Usuario Activada Correctamente');
    }

    public function desactivaruser(Request $request)
    {
          //1.- Desactivar User  
          $id       = $request["id"]; 
          
          DB::SELECT("CALL desactivar_user('$id')");
          
     
          return redirect('/admin_users')->with('desactiv','Cuenta del Usuario Desactivada Correctamente');
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
        $user = User::find($id);
        return view('administrador.edit',compact('user'));  
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
          $name      = $request["name"];
          $email     = $request["email"];
          $role_id   = $request["role_id"]; 
          $id        = $request["id"]; 

          DB::SELECT("UPDATE users SET NAME = '$name',email='$email',role_id='$role_id' WHERE id='$id'");
     
          return redirect('/admin_users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*-------------------------------------------------------- Eliminar ------------------------------------------------------------*/
    public function eliminar($id){
        //Funciones 
        DB::SELECT("SELECT b_user($id)");

       return redirect('/admin_users')->with('del','Usuario Eliminado Satisfactoriamente');
       
  
        //echo "Resgistro Eliminado";
    }

    public function destroy($id)
    {
        //
    }
}
