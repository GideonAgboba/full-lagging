<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'country',
        'zip',
        'bio',
        'password',
        'path'
    ];



    public function role(){
        return $this->belongsTo('App\Role');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
