<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banned extends Model
{
    protected $table = "banned";
	
	public function user(){
		return $this->belongsTo('App\User','idUser','id');
	}
}
