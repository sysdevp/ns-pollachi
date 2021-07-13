<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taxdummy extends Model
{
    public function item(){
        return $this->belongsTo(Item::class,'item_id','id');
    }
}
