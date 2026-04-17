<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokMovement extends Model
{
    protected $fillable = [
        'barang_id',
        'qty',
        'qty_awal',
        'qty_akhir',
        'type',
        'keterangan',
        'pegawai_id',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
