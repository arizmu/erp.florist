<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasUuids;
    protected $fillable = ['nama_barang', 'category_barang_id', 'comment', 'stock'];
}
