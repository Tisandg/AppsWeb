<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RequestProfile extends Authenticatable
{
	use Notifiable;
	protected $table = 'request_profile';
	public $timestamps = false;

	/* Los datos que va a aceptar*/
	protected $fillable = ['username', 'profile'];

	/*Las columnas que no nos interesan que sean llenadas en el metodo create*/
	protected $guarded	=['id','aceptada'];

}
