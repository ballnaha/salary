<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    //
    protected $table = 'pay'; //กำหนมดชื่อตาราง
    protected $fillable = ['startdate','pateint1','pateint2','pateint3','emp_id','money1','money2','money3','totalmoney1','totalmoney2','totalmoney3'];
}
