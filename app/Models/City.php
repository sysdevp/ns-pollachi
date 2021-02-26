<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    public function country(){
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }
    public function state(){
        return $this->belongsTo('App\Models\State', 'state_id', 'id');
    }
    public function district(){
        return $this->belongsTo('App\Models\District', 'district_id', 'id');
    }
    public static function validation($name)
    {
        return 'required';
    }
    public static function mandotory($name)
    {
        return '<span class="mandatory">*</span>';
    }
    
}
