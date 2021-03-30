<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denomination extends Model
{
    protected $fillable = ['id','amount','remark','active_status','created_by','updated_by'];
}
