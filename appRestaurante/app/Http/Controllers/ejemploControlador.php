<?php

namespace App\Http\Controllers;

class ejemploControlador extends Controller
{

	function holaMundo($nombre){

		return "Hola {$nombre}, desde el controlador";

	}

	function show(){
		return view('usuarios.index');
	}

}