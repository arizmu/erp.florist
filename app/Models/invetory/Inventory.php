<?php

namespace App\Models\invetory;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inventory extends Model
{
    use HasUuids;

    protected $fillable = ['factur_number', 'tanggal', 'supplier', 'comment','status'];

    /**
     * Get all of the inventory_detail for the Inventory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventory_detail(): HasMany
    {
        return $this->hasMany(InventoryDetail::class, 'inventory_id', 'id');
    }

}
