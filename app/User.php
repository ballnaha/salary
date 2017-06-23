<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','role','status','photo','department_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//     public static $rules = [
//     'username' => 'required',
//     'email' => 'required|unique:users|email',       
//     'password' => 'min:6|required',
//     'password_confirmation' => 'min:6|same:pass'    
// ];
}
