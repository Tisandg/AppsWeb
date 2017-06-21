<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Product extends Authenticatable
{
	use Notifiable;
	protected $table = 'products';
	protected $primaryKey = 'idproduct';

	protected $fillable = ['name', 'description', 'price','image'];

	protected $guarded = ['idproduct','created_at','updated_at'];
}


