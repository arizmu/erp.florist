<?php

namespace App\Models;

use App\Models\invetory\InventoryDetail;
use App\Models\Production\ProductionBarangDetail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    use HasUuids;
    protected $fillable = ['nama_barang', 'category_barang_id', 'comment', 'stock','price'];

    /**
     * Get all of the inventory_detail for the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventory_detail(): HasMany
    {
        return $this->hasMany(InventoryDetail::class, 'barang_id', 'id');
    }

    /**
     * Get all of the productin_detail for the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productin_detail(): HasMany
    {
        return $this->hasMany(ProductionBarangDetail::class, 'barang_id', 'id');
    }


    /**
     * Get the category that owns the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryBarang::class, 'category_barang_id', 'id');
    }
}
