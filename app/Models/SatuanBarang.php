<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SatuanBarang extends Model
{
    protected $table = "satuan_barangs";
    protected $fillable = ['nama_satuan', 'comment'];

    /**
     * Get all of the barang for the SatuanBarang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class, 'satuan_barang_id', 'id');
    }
}
