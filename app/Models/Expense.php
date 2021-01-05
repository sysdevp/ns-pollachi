<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function debit_head_det()
    {
        return $this->belongsTo(AccountHead::class, 'debit_account_head', 'id');
    }

    public function credit_head_det()
    {
        return $this->belongsTo(AccountHead::class, 'credit_account_head', 'id');
    }
}
