<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MDadministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /* Identificamos el usuario actual*/
        $usuarioActual = Auth::User();
        if(strcmp($usuarioActual->profile,'Administrador') !=0){

            session()->flash('message','Esta seccion es solo para administrador');
            return redirect()->route('home');
        }
        return $next($request);
    }
}
