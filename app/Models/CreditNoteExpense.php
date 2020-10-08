<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditNoteExpense extends Model
{
    public function expense_types()
    {
        return $this->belongsTo(ExpenseType::class, 'expense_type', 'id');
    }
}
