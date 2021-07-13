<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function location_type(){
        return $this->belongsTo('App\Models\LocationType', 'location_type_id', 'id');
    }
    public function country(){
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }
    public function state(){
        return $this->belongsTo('App\Models\State', 'state_id', 'id');
    }

    public function district(){
        return $this->belongsTo('App\Models\District', 'district_id', 'id');
    }

    public function city(){
        return $this->belongsTo('App\Models\City', 'city_id', 'id');
    }
}
