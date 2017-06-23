<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'employee'; //กำหนมดชื่อตาราง
    protected $fillable = ['photo','status','title','firstname','lastname','priority'];
}
