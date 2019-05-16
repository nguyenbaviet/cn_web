<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    public $table = 'apply';
    public $timestamps = false;
    public function job(){
    	return $this->belongsTo('App\Job','Id','idJob');
    }
    public function user(){
    	return $this->hasMany('App\User','username','idJob');
    }
}
