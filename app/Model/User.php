<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id_teams',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function scopeSearch($query){

        if(empty(request()->search)){
            return $query;
        }else{
            return $query->where('name','like','%'.request()->search.'%');
        }
    }
    public function team()
    {
        return $this->belongTo('App\Model\Team');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
}
