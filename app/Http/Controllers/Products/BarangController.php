<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        return view('Pages.Products.barang-index');
    }

    public function destory($key)
    {
        try {
            $query = Barang::find($key);
            $query->delete();
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'Record destroy is successfully',
                'data' => []
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 500,
                'status' => 'Error',
                'message' => 'Internal server Error',
                'data' => []
            ], 500);
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $query = Barang::create([
                'nama_barang' => $request->nama_barang,
                'category_barang_id' => $request->category_id,
                'comment' => $request->comment,
                'price' => $request->harga,
                'satuan_barang_id' => $request->satuan_id
            ]);
            DB::commit();
            return response()->json([
                'code' => 201,
                'status' => 'success',
                'message' => 'Stored is succesfully',
                'data' => $request->all()
            ], 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'status' => 'errors',
                'message' => 'Opss internal server error',
                'error' => $th->getMessage(),
                'data' => $request->all()
            ], 500);
        }
    }

    public function update(Request $request, $keyID)
    {
        DB::beginTransaction();
        try {
            $query = Barang::find($keyID);
            $query->update([
                'nama_barang' => $request->nama_barang,
                'category_barang_id' => $request->category_id,
                'comment' => $request->comment,
                'price' => intval($request->harga),
                'satuan_barang_id' => $request->satuan
            ]);

            DB::commit();
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'Update success!',
                'data' => $request->all()
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => 'Update failed!',
                'details' => $th->getMessage()
            ], 500);
        }
    }

    public function barangJson(Request $request)
    {
        $query = Barang::with('category', 'satuan')
            ->when($request->keywords, function ($e) use ($request) {
                $e->where('nama_barang', 'like', '%' . $request->keywords . '%');
            })
            ->latest()->paginate(15);
        return response()->json([
            'code' => 200,
            'status' => 'Ok',
            'message' => 'Data fetch successfully',
            'data' => $query,
        ]);
    }

    public function getSatuan()
    {
        $query = SatuanBarang::get();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'data fetch successfully',
            'data' => $query
        ]);
    }
}
