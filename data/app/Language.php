<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table= "languages";
    public function book(){
		return $this->hasMany('App\Book','lang_id','id');
	}
}
