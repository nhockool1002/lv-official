<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = "permission";
	
	public function users(){
		return $this->hsaMany('App\User','per_id', 'id');
	}
}
