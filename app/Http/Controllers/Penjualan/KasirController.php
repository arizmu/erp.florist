<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
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


    public function proudctJson() {
        $query = Product::query();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Data fetch successfully',
            'data' => $query->paginate(15)
        ]);
    }
}
