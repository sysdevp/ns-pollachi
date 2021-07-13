<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemwiseOffer extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','offer_name','offer_code','valid_from','valid_to','buy_item_id','buy_item_quantity','get_item_id','get_item_quantity','remark','created_by','updated_by','deleted_by','active_status'];
    
     public function item_det(){
        return $this->belongsTo('App\Models\Item', 'buy_item_id', 'id');
    }

    public function get_item_det(){
        return $this->belongsTo('App\Models\Item', 'get_item_id', 'id');
    }
   
}
