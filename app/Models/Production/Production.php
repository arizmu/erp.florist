<?php

namespace App\Models\Production;

use App\Models\Pegawai;
use App\Models\production\ProductionOtherDetail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Production extends Model
{
    use HasUuids;
    protected $fillable = ['code_production', 'production_title', 'production_date', 'production_start', 'production_end', 'production_status', 'production_cost', 'pegawai_id', 'amount_items', 'price_for_sale', 'delete_status', 'deleted_at', 'cost_items', 'distribution_status', 'preorder', 'nilai_jasa_crafter', 'jasa_reference'];

    /**
     * Get the pegawai that owns the Production
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function crafter(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }

    /**
     * Get all of the detail for the Production
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail(): HasMany
    {
        return $this->hasMany(ProductionBarangDetail::class, 'production_id', 'id');
    }

    /**
     * Get all of the otherDetail for the Production
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function otherDetail(): HasMany
    {
        return $this->hasMany(ProductionOtherDetail::class, 'production_id', 'id');
    }
}
