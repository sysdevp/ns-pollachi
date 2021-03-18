<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    public function designation_det()
    {
        return $this->belongsTo(Designation::class, 'role_id', 'id');
    }

    
}
