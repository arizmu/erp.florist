<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\CategoryBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        return view('Pages.Products.Categories.category-index');
    }

    public function store(Request $request)
    {
        try {
            $query = CategoryBarang::create([
                'category_name' => $request->category,
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
        $query = CategoryBarang::when(request()->search, function ($query) {
            $query->filter(request()->search);
        })->enable()->orderBy('created_at', 'desc')->paginate(request()->range ? request()->range : 15);
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
            $query = CategoryBarang::find($key);
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

    public function updated(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $query = CategoryBarang::find($id);
            $query->update([
                'category_name' => $request->category,
                'comment' => $request->comment
            ]);
            DB::commit();
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'Updated success!',
                'data' => $query
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'status' => 'success',
                'message' => 'Data fetched successfully',
                'details' => $th->getMessage()
            ], 500);
        }
    }
}
