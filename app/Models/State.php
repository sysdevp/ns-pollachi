<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;
    protected $fillable = ['id','code','name','country_id','remark','active_status','created_by','updated_by'];

}
