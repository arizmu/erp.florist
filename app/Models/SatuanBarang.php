<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SatuanBarang extends Model
{
    protected $table = "satuan_barangs";
    protected $fillable = ['nama_satuan', 'comment'];
}
