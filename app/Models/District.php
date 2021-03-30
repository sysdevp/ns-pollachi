<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;
    protected $fillable = ['id','name','country_id','state_id','remark','active_status','created_by','updated_by'];

    public function state(){
        return $this->belongsTo('App\Models\State', 'state_id', 'id');
    
    }
}
