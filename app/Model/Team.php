<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table='teams';
     public function scopeSearch($query){

        if(empty(request()->search)){
            return $query;
        }else{
            return $query->where('name','like','%'.request()->search.'%');
        }
    }
}
