<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['id','name','short_name','remark','active_status','created_by','updated_by'];
}
