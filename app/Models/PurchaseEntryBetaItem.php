<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseEntryBetaItem extends Model
{
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
    public function item_free_for()
    {
        return $this->belongsTo(Item::class, 'free_for', 'id');
    }
    public function uom()
    {
        return $this->belongsTo(Uom::class, 'uom_id', 'id');
    }
}
