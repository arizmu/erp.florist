<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailsTransaction extends Model
{
    use HasUuids;
    protected $table = 'details_transactions';

    protected $guarded = [];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    /**
     * Get all of the costume_item for the DetailsTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function costume_item(): HasMany
    {
        return $this->hasMany(CostumeDetailTransaction::class, 'details_transactions_id', 'id');
    }
}
