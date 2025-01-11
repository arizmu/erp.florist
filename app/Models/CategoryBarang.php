<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryBarang extends Model
{
    protected $fillable = ['category_name', 'comment', 'is_enable'];

    /**
     * Get all of the barang for the CategoryBarang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class, 'category_barang_id', 'id');
    }

    public function scopeEnable($query)
    {
        return $query->where('is_enable', true);
    }

    public function scopeFilter($query, $search) {
        $result = $query->where('category_name', 'like', '%' . $search . '%');
        return $result;
    }
}
