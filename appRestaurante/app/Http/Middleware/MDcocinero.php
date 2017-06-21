<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MDcocinero
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
        if(strcmp($usuarioActual->profile,'Cocinero') !=0){

            session()->flash('message','Esta seccion es solo para cocineros');
            return redirect()->route('home');
        }
        return $next($request);
    }
}
