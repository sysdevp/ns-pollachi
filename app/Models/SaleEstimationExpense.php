<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleEstimationExpense extends Model
{
    public function expense_types()
    {
        return $this->belongsTo(AccountHead::class, 'expense_type', 'id');
    }
}
