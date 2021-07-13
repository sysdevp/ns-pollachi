<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','name','country_id','state_id','district_id','remark','active_status','created_by','updated_by'];

    public function country(){
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }
    public function state(){
        return $this->belongsTo('App\Models\State', 'state_id', 'id');
    }
    public function district(){
        return $this->belongsTo('App\Models\District', 'district_id', 'id');
    }
}
