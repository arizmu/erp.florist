<?php

use App\Models\Production\Production;
use Carbon\Carbon;

function generateCodeProduction()
{
    $date = Carbon::now();
    $year = $date->format('y');
    $month = $date->format('m');
    $latestCode = Production::where('code_production', 'like', $year . $month . '%')->latest()->first();
    $increment = 1;
    $code = "";
    if ($latestCode) {
        if (substr($latestCode->code_production, 0, 4) === "$year$month") {
            $yearMonth = substr($latestCode->code_production, 0, 4);
            $latestIncrement = (int)substr($latestCode->code_production, 4, 8);
            $numberIncrement = $latestIncrement + 1;
            $code = $yearMonth . str_pad($numberIncrement, 4, 0, STR_PAD_LEFT);
        } else {
            $code = $year . $month . str_pad($increment, 4, '0', STR_PAD_LEFT);
        }
    } else {
        $code = $year . $month . str_pad($increment, 4, '0', STR_PAD_LEFT);
    }
    return $code;
}


function generateCodeTransaksi() {
    $code = 'TRX' . Carbon::now()->format('ym') . '-' . rand(000000, 999999);
    return $code;
}
