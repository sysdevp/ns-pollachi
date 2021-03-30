<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Giftvoucher extends Model
{
    protected $fillable = ['id','name','code','value','qty','remark','valid_from','valid_to','active_status','created_by','updated_by'];
}
