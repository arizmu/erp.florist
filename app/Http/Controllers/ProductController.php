<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Picqer\Barcode\BarcodeGeneratorHTML;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    public function index()
    {
        return view('Pages.produk-data.produk-index');
    }

    public function proudctJson(Request $request)
    {
        $query = Product::query()->isDelete(false)->latest();

        $query->when($request->keywords, function ($q) use ($request) {
            $q->where(function ($subQuery) use ($request) {
                $subQuery->where('product_name', 'LIKE', '%' . $request->keywords . '%')
                    ->orWhere('code', 'LIKE', '%' . $request->keywords . '%');
            });
        });

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Data fetch successfully',
            'data' => $query->paginate($request->range ?? 15)
        ]);
    }

    public function update(Request $request, $key)
    {
        DB::beginTransaction();
        try {
            $queryUpdate = Product::find($key);
            $file_path = "";
            if ($request->hasFile('img_file')) {
                $file_path = FileUpload($request->file('img_file'), "product/img/", $queryUpdate->id);
            }

            $queryUpdate->update([
                'img' => $file_path,
                // 'price' => $request->price
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

    public function delete(Request $request, $key)
    {
        $valid = Validator::make($request->all(), [
            'id' => ['required', 'exists:products,id']
        ]);
        if ($valid->fails()) {
            return getResponseJson('Error', 400, 'Data yang dihapus tidak ditemukan!', true, false);
        };
        DB::beginTransaction();
        try {
            $query = Product::find($key);
            $query->update([
                'deleted_status' => true,
                'deleted_at' => Carbon::now(),
                'deleted_by_user' => auth()->user()->name
            ]);
            DB::commit();
            return getResponseJson('success', 200, 'Data berhasil dihapus!', true, false);
        } catch (\Throwable $th) {
            DB::rollBack();
            return getResponseJson('Error', 500, 'Opps. data gagal dihapus!', true, $th->getMessage());
        }
    }

    public function generateBarcode($key)
    {
        $generator = new BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($key, $generator::TYPE_CODE_128);
        $pdf = Pdf::loadView('pdf.invoice', [
            'barcode' => $barcode,
            'code' => $key
        ]);
        $pdf->setPaper([0, 0, 198, 85]);
        return $pdf->stream('invoice.pdf'); 
    }
}
