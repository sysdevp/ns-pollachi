<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
    protected $fillable = ['id','name','description','remark','active_status','created_by','updated_by'];
}
