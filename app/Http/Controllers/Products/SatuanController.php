<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SatuanController extends Controller
{
    public function index()
    {
        return view('Pages.Products.satuan-index');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            SatuanBarang::create([
                'nama_satuan' => $request->satuan,
                'comment' => $request->comment
            ]);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 201,
                'message' => 'Satuan berhasil ditambahkan',
                'data' => 1
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'gagal menambah satuan baru!',
                'datail' => $th->getMessage()
            ]);
        }
    }

    public function update(Request $request, $key)
    {
        DB::beginTransaction();
        try {
            $queryFindUpdate = SatuanBarang::find($key);
            $queryFindUpdate->update([
                'nama_satuan' => $request->satuan,
                'comment' => $request->comment
            ]);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Satuan berhasil diperbaruhi!',
                'data' => ""
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'erro',
                'code' => 500,
                'message' => 'Satuan gagal diperbaruhi!',
                'details' => ""
            ], 500);
        }
    }

    public function hapus($key)
    {
        DB::beginTransaction();
        try {
            $query = SatuanBarang::find($key);
            $query->delete();
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Satuan berhasil dihapus',
                'data' => ""
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Satuan gagal dihapus',
                'data' => ""
            ], 500);
        }
    }

    public function dataJson() {
        $query = SatuanBarang::query();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'fetch data successfully',
            'data' => $query->paginate(15)
        ]);
    }
}
