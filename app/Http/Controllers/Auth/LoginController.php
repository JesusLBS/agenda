<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
  
    public function login(Request $request)
    {
        $email                 =$request["email"];
        $password              = $request["password"];
        $active_id                = $request["active_id"];
        if (Auth::attempt(['email' => $email, 'password' => $password, 'active_id' => 1])){
            {
                return redirect()->intended('/agenda_inicio');
            }
        }else{
                return back()
                ->with('error','Verifica tus Datos!!')
                ->withInput(request(['email']));
            }
            
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/agenda_inicio';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function logout(){
        Auth::logout();
        return redirect()->intended('/');
    }



}
