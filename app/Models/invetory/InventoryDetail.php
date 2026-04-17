<?php

namespace App\Models\invetory;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryDetail extends Model
{
    protected $table = 'inventory_details';

    // protected $fillable = ['inventory_id', 'barang_id', 'jumlah', 'tanggal', 'id'];
    protected $guarded = [];

    /**
     * Get the barang that owns the InventoryDetail
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }

    /**
     * Get the inventory that owns the InventoryDetail
     */
    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }
}
