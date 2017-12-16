<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Users extends Authenticatable
{
    protected $table = "users";
	
	public function permission(){
		return $this->belongsTo('App\Permission', 'per_id', 'id');
	}
	
	public function comment(){
		return $this->hasMany('App\Comment', 'user_id', 'id');
	}
    public function banned(){
		return $this->belongsTo('App\Banned', 'id', 'id');
	}
}
