<?php

namespace App\Models\Transaction;

use App\Models\Costumer;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasUuids;

    protected $table = 'transactions';

    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(DetailsTransaction::class, 'transaction_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(PaymentTransaction::class, 'transaction_id', 'id');
    }

    public function costumer()
    {
        return $this->belongsTo(Costumer::class, 'costumer_id', 'id');
    }
}
