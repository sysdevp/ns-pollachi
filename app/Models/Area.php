<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['id','name','code','remark','active_status','created_by','updated_by'];
}
