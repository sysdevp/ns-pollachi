<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemwiseOffer extends Model
{
    use SoftDeletes;
    
     public function item_det(){
        return $this->belongsTo('App\Models\Item', 'buy_item_id', 'id');
    }

    public function get_item_det(){
        return $this->belongsTo('App\Models\Item', 'get_item_id', 'id');
    }
   
}
