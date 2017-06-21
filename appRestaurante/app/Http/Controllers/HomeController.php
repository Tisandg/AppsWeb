<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::User();
        if( is_null($usuario->profile)){
            return redirect()->route('home')->with('info','Tu rol aun no ha sido aceptado por el administrador');    
        }
        if( strcmp($usuario->profile,'Mesero') == 0){
            return redirect()->route('createOrder');
        }
        if( strcmp($usuario->profile,'Cocinero') == 0){
            return redirect()->route('ordenes');
        }
        if( strcmp($usuario->profile,'Administrador') == 0){
            return redirect()->route('indexUser');
        }
        
    }
}
