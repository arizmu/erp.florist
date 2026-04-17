<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StokMovement;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stock()
    {
        return view('Pages.stock.stock');
    }

    public function stock_berjalan()
    {
        return view('Pages.stock.stock-berjalan');
    }

    public function stokJson(Request $request)
    {
        $query = Barang::query()
            ->join('satuan_barangs as s', 'barangs.satuan_barang_id', 's.id')
            ->join('category_barangs as c', 'barangs.category_barang_id', 'c.id')
            ->select('barangs.id', 'barangs.nama_barang', 'barangs.stock', 'barangs.price', 'c.category_name as category', 's.nama_satuan as satuan', 'barangs.updated_at')
            ->when($request->keyword, function ($query) use ($request) {
                $query->where('barangs.nama_barang', 'like', '%'.$request->keyword.'%')
                    ->orWhere('c.category_name', 'like', '%'.$request->keyword.'%')
                    ->orWhere('s.nama_satuan', 'like', '%'.$request->keyword.'%');
            });
        $data = $query->paginate(request()->per_page ?? 15);

        return response()->json([
            'status' => 'Ok',
            'data' => $data,
            'message' => 'Data retrieved successfully.',
            'request' => request()->all(),
        ]);
    }

    public function stokJsonBerjalan(Request $request)
    {

        $tanggal = explode(' to ', $request->range_tanggal);
        $tanggal_awal = $tanggal[0];
        $tanggal_akhir = $tanggal[1] ?? $tanggal[0];

        $tanggal_awal_full = $tanggal_awal.' 00:00:00';
        $tanggal_akhir_full = $tanggal_akhir.' 23:59:59';

        $query = StokMovement::query()
            ->join('barangs as b', 'stok_movements.barang_id', 'b.id')
            ->join('satuan_barangs as s', 'b.satuan_barang_id', 's.id')
            ->join('category_barangs as c', 'b.category_barang_id', 'c.id')
            ->join('pegawais as p', 'stok_movements.pegawai_id', 'p.id')
            ->select(
                'stok_movements.id as key',
                'stok_movements.keterangan',
                'stok_movements.type',
                'b.nama_barang',
                'stok_movements.qty',
                'stok_movements.qty_awal',
                'stok_movements.qty_akhir',
                'c.category_name as category',
                's.nama_satuan as satuan',
                'stok_movements.updated_at',
                'p.pegawai_name as pegawai'
            )
            ->when($request->keyword, function ($query) use ($request) {
                $query->where('b.nama_barang', 'like', '%'.$request->keyword.'%')
                    ->orWhere('c.category_name', 'like', '%'.$request->keyword.'%')
                    ->orWhere('s.nama_satuan', 'like', '%'.$request->keyword.'%')
                    ->orWhere('p.pegawai_name', 'like', '%'.$request->keyword.'%')
                    ->orWhere('stok_movements.keterangan', 'like', '%'.$request->keyword.'%');
            })
            ->when($request->tipe, function ($query) use ($request) {
                $query->where('stok_movements.type', $request->tipe);
            })
            ->when($request->range_tanggal, function ($query) use ($tanggal_awal_full, $tanggal_akhir_full) {
                $query->whereBetween('stok_movements.updated_at', [$tanggal_awal_full, $tanggal_akhir_full]);
            });
        $data = $query->orderBy('stok_movements.updated_at', 'desc')->paginate(request()->per_page ?? 15);

        return response()->json([
            'status' => 'Ok',
            'data' => $data,
            'message' => 'Data retrieved successfully.',
            'request' => request()->all(),
        ]);
    }
}
