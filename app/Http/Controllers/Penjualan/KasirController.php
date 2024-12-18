<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index() {
        return view('Pages.penjualan.transaksi-index');
    }

    public function kasir()
    {
        return view('Pages.penjualan.kasir.kasir-index');
    }
}
