<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Job extends Model
{
    public $table = 'job';
    public $timestamps = false;


    public function apply(){
    	return $this->hasMany('App\Apply','idJob','Id');
    }
    public function category(){
    	return $this->belongsTo('App\Category','idCategory','Id');
    }
    public function typeOfJob(){
    	return $this->belongsTo('App\TypeOfJob','idType','Id');
	}
	public function user(){
		return $this->belongsTo('App\User','username','Id');
	}
}
