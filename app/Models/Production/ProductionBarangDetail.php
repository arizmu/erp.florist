<?php

namespace App\Models\Production;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductionBarangDetail extends Model
{
    protected $fillable = ['production_id', 'barang_id', 'amount_item', 'cost_item', 'total_cost', 'status', 'item_status', 'item_name'];

    /**
     * Get the production that owns the ProductionBarangDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function production(): BelongsTo
    {
        return $this->belongsTo(Production::class, 'production_id', 'id');
    }

    /**
     * Get the barang that owns the ProductionBarangDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
