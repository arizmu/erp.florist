<?php

namespace App\Http\Controllers\Produksi;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    public function index() {
        return view('Pages.produksi.produksi-index');
    }

    public function produksi_baru() {
        return view('Pages.produksi.produksi-form');
    }

    function getBahanBaku() {
        $query = Barang::query();
        $query->when(request()->key, function ($query) {
            $query->where('nama_barang', 'like', '%' . request()->key . '%');
        });
        return response()->json([
            'code' => '200',
            'status' => 'Ok',
            'message' => 'data fetch',
            'data' => $query->take(15)->get()
        ]);
    }

}
