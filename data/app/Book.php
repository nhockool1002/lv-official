<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table= "book";
	
	public function publisher(){
		return $this->belongsTo('App\Publisher','pub_id','id');
	}
	
	public function author(){
		return $this->belongsTo('App\Author','auth_id','id');
	}
    
    public function language(){
		return $this->belongsTo('App\Language','lang_id','id');
	}
	
	public function categories(){
		return $this->belongsTo('App\Categories','cat_id','id');
	}
	
	public function comment(){
		return $this->hasMany('App\Comment','book_id', 'id');
	}
}
