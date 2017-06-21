<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class OrderProduct extends Authenticatable
{
	use Notifiable;
	protected $table = 'orderproducts';
	protected $primaryKey = 'idorderproduct';
	public $timestamps = false;

}

