<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = "categories";
	
	public function books(){
		return $this->hasMany('App\Book', 'cat_id', 'id');
	}
}
