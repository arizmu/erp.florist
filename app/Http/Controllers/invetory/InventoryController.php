<?php

namespace App\Http\Controllers\invetory;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index() {
        return view('Pages.inventaris.invetaris-index');
    }

    public function formInventory() {
        return view('Pages.inventaris.inventory-form');
    }

    public function getBarang() {
        $query = Barang::query();
        $query->when(request()->key, function($query) {
            $query->where('nama_barang', 'like', '%'.request()->key.'%');
        });
        return response()->json([
            'code' => '200',
            'status' => 'Ok',
            'message' => 'data fetch',
            'data' => $query->take(15)->get()
        ]);
    }

    public function storeInvetory(Request $request) {
        $request->all();
    }
}
