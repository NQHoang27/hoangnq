<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $table = "projects";
    
    protected $fillable = [
		'name','id_user'
	];
     public function scopeSearch($query){

        if(empty(request()->search)){
            return $query;
        }else{
            return $query->where('name','like','%'.request()->search.'%');
        }
    }
}
