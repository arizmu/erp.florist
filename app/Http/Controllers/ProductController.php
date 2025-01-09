<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('Pages.produk-data.produk-index');
    }

    public function proudctJson()
    {
        $query = Product::query();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Data fetch successfully',
            'data' => $query->paginate(15)
        ]);
    }

    public function update(Request $request, $key)
    {
        DB::beginTransaction();
        try {
            $queryUpdate = Product::find($key);
            $file_path = "";
            if ($request->hasFile('img_file')) {
                // $fileUpload = $request->file('img_file');
                // $file_ext = $fileUpload->getClientOriginalExtension();
                // $file_name_key = $queryUpdate->id . "." . $file_ext;
                // $path = "product/img/";
                // $file_path = $path . $file_name_key;
                // $file_save = Storage::putFileAs($path, $fileUpload, $file_name_key);

                $file_path = FileUpload($request->file('img_file'), "product/img/", "hello-world");
            }

            $queryUpdate->update([
                'img' => $file_path,
                'price' => $request->price
            ]);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'update successfully',
                'data' => [
                    'query' => $queryUpdate,
                    'request' => $request->all(),
                    'getFile' => Storage::url($file_path)
                ]
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Updated failed',
                'datails' => $th->getMessage()
            ]);
        }
    }
}
