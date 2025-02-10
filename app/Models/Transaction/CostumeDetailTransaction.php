<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CostumeDetailTransaction extends Model
{
    // use HasUuids;
    protected $guarded = [];

    /**
     * Get the transaction_details that owns the CostumeDetailTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction_details(): BelongsTo
    {
        return $this->belongsTo(DetailsTransaction::class, 'details_transactions_id', 'id');
    }
}
