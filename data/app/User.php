<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
	
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
