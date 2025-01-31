<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasUuids;

    protected $fillable = ['product_name', 'comment', 'qty', 'cost_production','price', 'jenis_product_id', 'ref_production_id', 'img', 'code'];
}
