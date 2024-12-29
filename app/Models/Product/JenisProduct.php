<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class JenisProduct extends Model
{
    use HasUuids;
    protected $fillable = ['jenis', 'comment'];
}
