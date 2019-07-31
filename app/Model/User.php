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
        'name', 'email', 'password', 'id_teams',
    ];

    
    protected $hidden = [
        'password', 'remember_token',
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
            return $query->where('name', 'like', '%'. request()->search. '%');
        }
    }
    
    /**
     * [team belongto user]
     * @return mixed
     */
    public function team()
    {
        return $this->belongTo('App\Model\Team');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = strlen($value) > 50 ? $value : bcrypt($value);
    }
}
