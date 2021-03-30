<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use SoftDeletes;
    public function address_details(){
        return $this->hasMany('App\Models\AddressDetails','address_ref_id','id');
    }

    public function proof_details(){
        return $this->hasMany('App\Models\ProofDetails','proof_ref_id','id');
    }

    public function delete(){
        $this->address_details()->delete();
        $this->proof_details()->delete();
    }
}
