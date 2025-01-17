<?php

use App\Models\Pegawai;
use App\Models\Production\RefSeviceCharge;

function getResponseJson($status, $resError, $resMessage, $data, $errorDetails) {
    return response()->json([
        'status' => $status,
        'code' => $resError,
        'message' => $resMessage,
        'data' => $data,
        'errors' => $errorDetails
    ], $resError);
}


function getPegawai() {
    $query = Pegawai::query();
    return $query;
}

function getReferensiJasa() {
    $query = RefSeviceCharge::query();
    return $query;
}