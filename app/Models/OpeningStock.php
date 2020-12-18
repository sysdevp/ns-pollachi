<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpeningStock extends Model
{
    public function opening_stocks()
    {
        return $this->belongsTo(Item::class, 'id', 'item_id');
    }
}
