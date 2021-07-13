<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressDetails extends Model
{
    use SoftDeletes;
    
    public function state(){
        return $this->belongsTo('App\Models\State','state_id','id');
    }
    
    public function district(){
        return $this->belongsTo('App\Models\District','district_id','id');
    }

    public function city(){
        return $this->belongsTo('App\Models\City','city_id','id');
    }

    public function address_type(){
        return $this->belongsTo('App\Models\AddressType','address_type_id','id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class,'address_ref_id','id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'address_ref_id','id');
    }
}
