<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estimation_Item extends Model
{
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
    public function uom()
    {
        return $this->belongsTo(Uom::class, 'uom_id', 'id');
    }
}
