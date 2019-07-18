<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table='projects';
     public function scopeSearch($query){

        if(empty(request()->search)){
            return $query;
        }else{
            return $query->where('name','like','%'.request()->search.'%');
        }
    }
}
