<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Order extends Authenticatable
{
	protected $table = 'orders';
	protected $primaryKey = 'idorder';
	public $timestamps = false;

	public function user(){

		return $this->belongsTo(User::class);
	}
}

