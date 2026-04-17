<?php

// ketika ada transaksi baru akan langsung membuat data pembayaran -> payment_transacitons table

use App\Models\Transaction\PaymentTransaction;
use Carbon\Carbon;

function createPaymentData($arrayData)
{
    $query = PaymentTransaction::create([
        'transaction_id' => $arrayData['transaction_id'],
        'total_payment' => $arrayData['total_payment'],
        'total_paid' => $arrayData['total_paid'],
        'discount' => 0,
        'point' => 0,
        'total_unpaid' => $arrayData['total_unpaid'],
        'total_cashback' => $arrayData['total_cashback'],
        'payment_amount' => $arrayData['payment_amount'],
        'factur_number' => $arrayData['factur_number'],
        'payment_method' => $arrayData['payment_method'],
        'is_status' => false,
    ]);

    return $query->id;
}

function prosesPembayaranTransaksi($arrayData)
{
    $query = PaymentTransaction::find($arrayData['pembayaran_id']);
    $query->update([
        'is_status' => true,
        'payment_amount' => $arrayData['payment_amount'],
        'discount' => $arrayData['discount'],
        'point' => $arrayData['point'],
        'payment_method' => $arrayData['payment_method'],
        'total_cashback' => $arrayData['total_cashback'],
    ]);

    return $query;
}

function generateFactur()
{
    $code = 'FTR'.Carbon::now()->format('ym').'-'.rand(000000, 999999);

    return $code;
}
