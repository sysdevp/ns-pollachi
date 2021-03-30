<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocationType extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','name','remark','active_status','created_by','updated_by'];
}
