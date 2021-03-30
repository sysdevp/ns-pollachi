<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseEntryItem extends Model
{
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
    public function uom()
    {
        return $this->belongsTo(Uom::class, 'uom_id', 'id');
    }

    public function purchase_entries()
    {
        return $this->belongsTo(PurchaseEntry::class, 'p_no', 'p_no');
    }
}
