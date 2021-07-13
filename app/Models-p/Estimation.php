<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estimation extends Model
{
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }

   
}
