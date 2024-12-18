<?php

namespace App\Http\Controllers\Produksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    public function index() {
        return view('Pages.produksi.produksi-index');
    }

    public function produksi_baru() {
        return view('Pages.Products.barang-index');
    }


}
