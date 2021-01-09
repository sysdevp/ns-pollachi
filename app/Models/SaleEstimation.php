<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleEstimation extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }

    public function salesman()
    {
        return $this->belongsTo(SalesMan::class, 'salesman_id', 'id');
    }
}
