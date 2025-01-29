<?php

namespace App\Models\production;

use App\Models\Production\Production;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductionOtherDetail extends Model
{
    // protected $fillable = ['id', 'production_id', 'item_name', 'qty', 'cost', 'total_cost', 'comment'];
    
    protected $guarded = [];

    /**
     * Get the production that owns the ProductionOtherDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function production(): BelongsTo
    {
        return $this->belongsTo(Production::class, 'production_id', 'id');
    }
}
