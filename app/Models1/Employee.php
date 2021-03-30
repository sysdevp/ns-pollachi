<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    public function department(){
        return $this->belongsTo('App\Models\Department','department_id','id');
    }

    public function address_details(){
        return $this->hasMany('App\Models\AddressDetails','address_ref_id','id');
    }

    public function delete(){
        $this->address_details()->delete();
    }
}
