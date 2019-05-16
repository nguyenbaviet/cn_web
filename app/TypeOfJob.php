<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfJob extends Model
{
    public $table = 'typeofjob';
    public $timestamps = false;
        public function job(){
    	return $this->hasMany('App\TypeOfJob','idType','Id');
    }
}
