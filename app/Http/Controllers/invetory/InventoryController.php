<?php

namespace App\Http\Controllers\invetory;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\invetory\Inventory;
use App\Models\invetory\InventoryDetail;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index()
    {
        return view('Pages.inventaris.invetaris-index');
    }

    public function formInventory()
    {
        return view('Pages.inventaris.inventory-form');
    }

    public function getBarang()
    {
        $query = Barang::query()->with('satuan');
        $query->when(request()->key, function ($query) {
            $query->where('nama_barang', 'like', '%'.request()->key.'%');
        });

        return response()->json([
            'code' => '200',
            'status' => 'Ok',
            'message' => 'data fetch',
            'data' => $query->take(15)->get(),
        ]);
    }

    public function storeInvetory(Request $request)
    {
        DB::beginTransaction();
        try {
            $tanggal = Carbon::parse($request->tanggal_penerimaan);
            $queryInvetory = Inventory::create([
                'factur_number' => $request->nomor_faktur,
                'tanggal' => $tanggal,
                'supplier' => $request->supplier,
                'comment' => $request->comment,
                'status' => true,
            ]);

            $detailBarang = $request->items;
            foreach ($detailBarang as $value) {
                $barang = Barang::find($value['id']);
                $barangOldStock = $barang->stock;
                $barangAddStock = $value['stock'];
                InventoryDetail::insert([
                    'inventory_id' => $queryInvetory->id,
                    'barang_id' => $barang->id,
                    'jumlah' => $value['stock'],
                    'tanggal' => $tanggal,
                ]);
                $barang->update(['stock' => $barangOldStock + $barangAddStock]);

                $pegawai = Pegawai::find(Auth::user()->pegawai_id);
                $arrayData = [
                    'barang_id' => $barang->id,
                    'qty' => $barangAddStock,
                    'qty_awal' => $barangOldStock,
                    'qty_akhir' => $barangOldStock + $barangAddStock,
                    'type' => true,
                    'keterangan' => '[ Penerimaan Barang ] '.$request->comment ?? '',
                    'pegawai_id' => $pegawai->id,
                ];
                StockMovementCreate($arrayData);
            }

            DB::commit();

            return response()->json([
                'code' => '200',
                'status' => 'success',
                'message' => 'Stored successfully.',
                'data' => $request->all(),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'code' => '500',
                'status' => 'Error',
                'message' => 'Server errors',
                'errors' => $th->getMessage(),
                'data' => $request->all(),
            ], 500);
        }
    }

    public function IndexJsonInventory()
    {
        $query = Inventory::query();

        if (request()->estimasi) {
            $tanggal = request()->estimasi ? explode('to', request()->estimasi) : [Carbon::now()->toDateString()];
            $tanggalStart = Carbon::parse($tanggal[0])->format('Y-m-d');
            $tanggalEnd = isset($tanggal[1]) ? Carbon::parse($tanggal[1])->format('Y-m-d') : $tanggalStart;
            $query->whereBetween('tanggal', [$tanggalStart, $tanggalEnd]);
        }

        $query->when(request()->status !== null, function ($query) {
            $query->where('status', request()->status);
        });

        $data = $query->paginate(request()->range ? request()->range : 15);

        return response()->json([
            'status' => 'Ok',
            'data' => $data,
            'message' => 'Data retrieved successfully.',
            'request' => request()->all(),
        ]);
    }

    public function detailInventory()
    {
        $query = InventoryDetail::where('inventory_id', request()->key)->with('barang')->get();

        return response()->json([
            'status' => 'Ok',
            'data' => $query,
            'message' => 'Data fetch details successfully.',
        ]);
    }

    public function details()
    {
        return view('Pages.inventaris.invetory-details');
    }

    public function detailJson()
    {
        $query = InventoryDetail::query()->with('barang');

        if (request()->estimasi) {
            $tanggal = request()->estimasi ? explode('to', request()->estimasi) : [Carbon::now()->toDateString()];
            $tanggalStart = Carbon::parse($tanggal[0])->format('Y-m-d');
            $tanggalEnd = isset($tanggal[1]) ? Carbon::parse($tanggal[1])->format('Y-m-d') : $tanggalStart;
            $query->whereBetween('tanggal', [$tanggalStart, $tanggalEnd]);
        }

        if (request()->barang_id) {
            $query->where('barang_id', request()->barang_id);
        }

        return response()->json([
            'status' => 'Ok',
            'data' => $query->paginate(request()->range ? request()->range : 15),
            'message' => 'Data retrieved successfully.',
            'request' => request()->all(),
        ]);
    }

    public function referensiBarang()
    {
        $query = Barang::query();
        if (request()->search) {
            $query->where('nama_barang', 'like', '%'.request()->search.'%');
        }

        return response()->json([
            'status' => 'Ok',
            'data' => $query->get()->take(15),
            'message' => 'Data retrieved successfully.',
            'request' => request()->all(),
        ]);
    }

    public function barang_keluar()
    {
        return view('Pages.inventaris.barang-keluar');
    }

    public function getPegawai()
    {
        $query = Pegawai::query()->select('id as key', 'pegawai_name as name');
        if (request()->search) {
            $query->where('pegawai_name', 'like', '%'.request()->search.'%');
        }

        return response()->json([
            'status' => 'Ok',
            'data' => $query->get()->take(15),
            'message' => 'Data retrieved successfully.',
            'request' => request()->all(),
        ]);
    }

    public function barangKeluar(Request $request)
    {
        $validasi = $request->validate([
            'petugas' => 'required|exists:pegawais,id',
            'tujuan' => 'required|string',
            'tanggal' => 'required|date',
            'details' => 'required|array',
            'details.*.key' => 'required|exists:barangs,id',
            'details.*.qty' => 'required|numeric|gt:0',
        ]);

        DB::beginTransaction();
        try {
            $query = Inventory::create([
                'factur_number' => '-',
                'tanggal' => $request->tanggal,
                'supplier' => null,
                'comment' => $request->keterangan ?? '',
                'status' => false,
            ]);
            $details = $request->details;
            $pegawai_id = $request->petugas;
            $tujuan = $request->tujuan;
            foreach ($details as $item) {
                $qBarang = Barang::find($item['key']);
                $oldStock = $qBarang->stock;
                $qty = $item['qty'];
                $newStock = $oldStock - $qty;

                $arrayData = [
                    'barang_id' => $qBarang->id,
                    'qty' => $qty,
                    'qty_awal' => $oldStock,
                    'qty_akhir' => $newStock,
                    'type' => false,
                    'keterangan' => 'Barang Keluar | '.$tujuan.' | '.$request->keterangan ?? '',
                    'pegawai_id' => $pegawai_id,
                ];
                StockMovementCreate($arrayData);
                DB::table('inventory_details')->insert([
                    'inventory_id' => $query->id,
                    'barang_id' => $qBarang->id,
                    'jumlah' => $qty,
                    'tanggal' => $request->tanggal,
                ]);
                $qBarang->update(['stock' => $newStock]);
                InventoryDetail::create([
                    'inventory_id' => $query->id,
                    'barang_id' => $qBarang->id,
                    'jumlah' => $qty,
                    'tanggal' => $request->tanggal,
                ]);

            }

            DB::commit();

            return response()->json([
                'status' => [
                    'code' => '200',
                    'message' => 'Data retrieved successfully.',
                ],
                'data' => $request->all(),
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'status' => [
                    'code' => '500',
                    'message' => 'Server errors',

                ],
                'errors' => $th->getMessage(),
                'data' => $request->all(),
            ], 500);
        }
    }
}
