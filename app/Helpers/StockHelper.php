<?php

use App\Models\StokMovement;

function StockMovementCreate($arrayData)
{
    $query = StokMovement::create([
        'barang_id'  => $arrayData['barang_id'],
        'qty'        => $arrayData['qty'],
        'qty_awal'   => $arrayData['qty_awal'],
        'qty_akhir'  => $arrayData['qty_akhir'],
        'type'       => $arrayData['type'],
        'keterangan' => $arrayData['keterangan'],
        'pegawai_id' => $arrayData['pegawai_id'],
    ]);
    return $query;
}
