<?php

namespace App\Models;

use App\Models\Transaction\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Costumer extends Model
{
    protected $table = 'costumers';
    protected $guarded = [];

    /**
     * Get all of the transaction for the Costumer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class, 'costumer_id', 'id');
    }
}
