<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
    public function uom()
    {
        return $this->belongsTo(Uom::class, 'uom_id', 'id');
    }
    public function black_or_white()
    {
    	return $this->belongsTo(PurchaseOrderBlackItem::class, 'po_no', 'po_no');
    }
}
