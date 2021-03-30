<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemWastage extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','entry_date','location_id','item_id','quantity','remark','created_by','updated_by','deleted_by','active_status','uom_id'];
    
     public function item_det(){
        return $this->belongsTo('App\Models\Item', 'item_id', 'id');
    }

    public function location_det(){
        return $this->belongsTo('App\Models\Location', 'location_id', 'id');
    }

    public function uom_det(){
        return $this->belongsTo('App\Models\Uom', 'uom_id', 'id');
    }
   
}
