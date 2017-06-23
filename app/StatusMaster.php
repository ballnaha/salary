<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusMaster extends Model
{
    //
    protected $table = 'status_master'; //กำหนมดชื่อตาราง
    protected $fillable = ['name','type','status','code'];
}
