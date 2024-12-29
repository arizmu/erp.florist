<?php

namespace App\Http\Controllers;

use App\Models\CategoryBarang;
use App\Models\Product\JenisProduct;
use Illuminate\Http\Request;

class JenisProductController extends Controller
{
    public function index()
    {
        return view('Pages.produk-data.produk-jenis');
    }

    public function store(Request $request)
    {
        try {
            $query = JenisProduct::create([
                'jenis' => $request->jenis,
                'comment' => $request->comment
            ]);
            return response()->json([
                'code' => 201,
                'status' => 'success',
                'message' => 'Store data is successfully',
                'data' => $query
            ], 201);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function dataJson()
    {
        $query = JenisProduct::orderBy('created_at', 'desc')->paginate(15);
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Data fetched successfully',
            'data' => $query
        ]);
    }

    public function destroy($key)
    {
        try {
            $query = JenisProduct::find($key);
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
}
