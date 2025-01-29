<?php

namespace App\Http\Controllers\Produksi;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Product\JenisProduct;
use App\Models\Product\Product;
use App\Models\Production\Production;
use App\Models\Production\ProductionBarangDetail;
use App\Models\production\ProductionOtherDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduksiController extends Controller
{
    public function index()
    {
        return view('Pages.produksi.produksi-index');
    }

    public function produksi_baru()
    {
        return view('Pages.produksi.produksi-form');
    }

    function getBahanBaku()
    {
        $query = Barang::query()->select('id', 'nama_barang', 'stock', 'price');
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

    public function getPegawai()
    {
        $query = Pegawai::select('id', 'pegawai_name');
        return response()->json([
            'status' => 'Ok',
            'code' => 200,
            'message' => 'Data fetch',
            'data' => $query->get()
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $production = $request->detail;
            $tanggal = explode("to", $production['estimasi']);
            $tanggalStart = Carbon::parse($tanggal[0]);
            $tanggalEnd = count($tanggal) > 1 ? Carbon::parse($tanggal[1]) : $tanggalStart;
            $productionQuery = Production::create([
                'code_production' => $this->codeProduksi(),
                'production_title' => $production['title_product'],
                'production_date' => $tanggalStart->format('Y-m-d'),
                'production_start' => $tanggalStart->format('Y-m-d'),
                'production_end' => $tanggalEnd->format('Y-m-d'),
                'production_status' => false,
                'production_cost' => filter_var($request['biaya_produksi'], FILTER_SANITIZE_NUMBER_INT),
                'pegawai_id' => $production['crafter']
            ]);

            foreach ($request->items as $value) {
                if (!$value['status']) {
                    ProductionBarangDetail::create([
                        'production_id' => $productionQuery->id,
                        'barang_id' => $value['id'],
                        'amount_item' => $value['qty'],
                        'cost_item' => $value['price'],
                        'total_cost' => $value['total_price'],
                        'status' => false
                    ]);
                } else {
                    ProductionOtherDetail::create([
                        'production_id' => $productionQuery->id,
                        'id' => $value['id'],
                        'item_name' => $value['item'],
                        'qty' => $value['qty'],
                        'cost' => $value['price'],
                        'total_cost' => $value['total_price'],
                        'comment' => $value['comment']
                    ]);
                }
            }

            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Production data stored successfully',
                'data' => $productionQuery
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 'Bugs',
                'code' => 500,
                'message' => 'Internal server errors',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function codeProduksi()
    {
        $date = Carbon::now();
        $year = $date->format('y');
        $month = $date->format('m');
        $latestCode = Production::where('code_production', 'like', $year . $month . '%')->latest()->first();
        $increment = 1;
        $code = "";
        if ($latestCode) {
            if (substr($latestCode->code_production, 0, 4) === "$year$month") {
                $yearMonth = substr($latestCode->code_production, 0, 4);
                $latestIncrement = (int)substr($latestCode->code_production, 4, 8);
                $numberIncrement = $latestIncrement + 1;
                $code = $yearMonth . str_pad($numberIncrement, 4, 0, STR_PAD_LEFT);
            } else {
                $code = $year . $month . str_pad($increment, 4, '0', STR_PAD_LEFT);
            }
        } else {
            $code = $year . $month . str_pad($increment, 4, '0', STR_PAD_LEFT);
        }
        return $code;
    }

    public function productionJson()
    {
        $query = Production::query()->latest();
        return response()->json([
            'status' => 'ok',
            'code' => 200,
            'message' => 'Data fetch successfully.',
            'data' => $query->get()
        ]);
    }

    public function toComplate($key)
    {
        sleep(1);
        DB::beginTransaction();
        try {
            $query = Production::find($key);
            $query->update([
                'production_status' => true
            ]);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => '200',
                'message' => 'Updated successfully.',
                'data' => $query
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => 'Bugs',
                'code' => 500,
                'message' => 'internal server errors',
                'details' => $th->getMessage()
            ]);
        }
    }

    public function distributionToProduct($key)
    {
        // return $key;
        DB::beginTransaction();
        try {
            $productionQuery = Production::find($key);
            $jeniQuery = JenisProduct::first();
            $nilaiProduction = $productionQuery->production_cost;
            
            Product::create([
                'product_name' => $productionQuery->production_title,
                'comment' => 'form production',
                'qty' => 1,
                'cost_production' => $productionQuery->production_cost,
                'jenis_product_id' => $jeniQuery->id,
                'ref_production_id' => $productionQuery->id,
                'price' => $nilaiProduction + ($nilaiProduction * 35 / 100)
            ]);
            $productionQuery->update(['distribution_status' => true]);

            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Distribution product successfully.',
                'data'  => $productionQuery
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'Bugs',
                'code' => 500,
                'message' => "Internal server error",
                'errors' => $th->getMessage()
            ], 500);
        }
    }

    public function getDetailBahanBaku($keyId)
    {
        $queryMaterial = ProductionBarangDetail::where('production_id', $keyId)->with('barang')->get();
        $materialDetails = [];
        foreach ($queryMaterial as $value) {
            $materialDetails[] = [
                'nama' => $value->barang->nama_barang,
                'harga' => $value->cost_item,
                'jumlah' => $value->amount_item,
                'total' => $value->total_cost,
                'status' => false
            ];
        }

        $queryOther = ProductionOtherDetail::where('production_id', $keyId)->get();
        $otherDetails = [];
        foreach ($queryOther as $value) {
            $otherDetails[] = [
                'nama' => $value->item_name,
                'harga' => $value->cost,
                'jumlah' => $value->qty,
                'total' => $value->total_cost,
                'status' => true
            ];
        }
        $mergedDetails = array_merge($materialDetails, $otherDetails);
        return getResponseJson('ok', 200, 'Data detail bahan baku', $mergedDetails, false);
    }

    public function registreProduct(Request $request)
    {
        try {
            return getResponseJson('ok', 200, 'Produk berhasil ditambahkan', "", false);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
