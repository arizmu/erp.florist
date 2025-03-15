<?php

namespace App\Http\Controllers\invetory;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\invetory\Inventory;
use App\Models\invetory\InventoryDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $query->where('nama_barang', 'like', '%' . request()->key . '%');
        });
        return response()->json([
            'code' => '200',
            'status' => 'Ok',
            'message' => 'data fetch',
            'data' => $query->take(15)->get()
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
                'status' => true
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
                    'tanggal' => $tanggal
                ]);
                $barang->update(['stock' => $barangOldStock + $barangAddStock]);
            }

            DB::commit();
            return response()->json([
                'code' => '200',
                'status' => 'success',
                'message' => 'Stored successfully.',
                'data' => $request->all()
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'code' => '500',
                'status' => 'Error',
                'message' => 'Server errors',
                'errors' =>  $th->getMessage(),
                'data' => $request->all()
            ], 500);
        }
    }

    public function IndexJsonInventory()
    {
        $query = Inventory::query();

        if (request()->estimasi) {
            $tanggal = request()->estimasi ? explode("to", request()->estimasi) : [Carbon::now()->toDateString()];
            $tanggalStart = Carbon::parse($tanggal[0])->format('Y-m-d');
            $tanggalEnd = isset($tanggal[1]) ? Carbon::parse($tanggal[1])->format('Y-m-d') : $tanggalStart;
            $query->whereBetween('tanggal', [$tanggalStart, $tanggalEnd]);
        }

        return response()->json([
            'status' => 'Ok',
            'data' => $query->paginate(request()->range ? request()->range : 15),
            'message' => 'Data retrieved successfully.',
            'request' => request()->all()
        ]);
    }

    public function detailInventory()
    {
        $query = InventoryDetail::where('inventory_id', request()->key)->with('barang')->get();
        return response()->json([
            'status' => 'Ok',
            'data' => $query,
            'message' => 'Data fetch details successfully.'
        ]);
    }
}
