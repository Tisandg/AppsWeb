<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
	use Notifiable;
	protected $table = 'customers';
	protected $primaryKey ='iduser';

	/* Los datos que va a aceptar*/
	protected $fillable = ['name', 'lastname', 'docid','email'];

	/*Las columnas que no nos interesan que sean llenadas en el metodo create*/
	protected $guarded	=['id','pin','created_at','updated_at'];

	/* Creando funciones auxiliares*/
    public function generarPin(){

        /* Generamos el pin de 4 caracteres */
        $pin  = mt_rand(1000, 9999);
        $pinValido = false;
        /* Comprobamos que no exista en la base de datos */
        while($pinValido == false){
    		$customer = Customer::all()->where('pin',$pin);
	        if( is_null($customer)){
	        	/*Generamos un nuevo pin*/
	        	$pin  = mt_rand(1000, 9999);
	        }else{
	        	$pinValido = true;
	        }
        }

        /* retornamos el pin */
        return $pin;
    }

}


