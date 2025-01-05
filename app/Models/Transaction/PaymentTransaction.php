<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    use HasUuids;
    protected $table = 'payment_transactions';

    protected $guarded = [];
    
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
