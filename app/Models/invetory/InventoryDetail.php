<?php

namespace App\Models\invetory;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryDetail extends Model
{
    use HasUuids;
    protected $table = 'inventory_details';
    protected $fillable = ['inventory_id', 'barang_id', 'jumlah', 'tanggal'];

    /**
     * Get the barang that owns the InventoryDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }

    /**
     * Get the inventory that owns the InventoryDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }
}
