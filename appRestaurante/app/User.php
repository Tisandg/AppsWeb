<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /* Los datos que va a aceptar*/
    protected $fillable = ['name', 'lastname', 'docid','username','email','password','pin'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*Las columnas que no nos interesan que sean llenadas en el metodo create*/
    protected $guarded  =['id','created_at','updated_at'];

    /* Creando funciones auxiliares*/
    public static function generarPin(){

        /* Generamos el pin de 4 caracteres */
        $pin  = mt_rand(1000, 9999);
        $pinValido = false;
        /* Comprobamos que no exista en la base de datos */
        while($pinValido == false){
            $user = User::all()->where('pin',$pin);
            if( is_null($user)){
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
