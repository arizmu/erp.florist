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
use App\Models\Production\RefSeviceCharge;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $validasi = Validator::make($request->all(), [
            'item.*' => ['required'],
            'detail.title_product' => ['required'],
            'detail.estimasi' => ['required'],
            'detail.crafter' => ['required'],
            'detail.jasa' => ['required'],
            'detail.amount_items' => ['required'],
            'detail.production_cost' => ['required'],
            'detail.price_to_sale' => ['required'],
            'amount_items' => ['required'],
            'price' => ['required'],
            'jasa' => ['required'],
        ]);
        if ($validasi->fails()) {
            return getResponseJson('errors', 400, 'bad request', $request->all(), $validasi->errors());
        }

        DB::beginTransaction();
        try {
            $production = $request->detail;
            $tanggal = explode("to", $production['estimasi']);
            $tanggalStart = Carbon::parse($tanggal[0]);
            $tanggalEnd = count($tanggal) > 1 ? Carbon::parse($tanggal[1]) : $tanggalStart;
            $jasa = RefSeviceCharge::find($request->jasa);
            $productionQuery = Production::create([
                'code_production' => $this->codeProduksi(),
                'production_title' => $production['title_product'],
                'production_date' => $tanggalStart->format('Y-m-d'),
                'production_start' => $tanggalStart->format('Y-m-d'),
                'production_end' => $tanggalEnd->format('Y-m-d'),
                'production_status' => false,
                'production_cost' => filter_var($request['biaya_produksi'], FILTER_SANITIZE_NUMBER_INT),
                'pegawai_id' => $production['crafter'],
                'price_for_sale' => intval($request['detail']['price_to_sale']),
                'amount_items' => 1,
                'cost_items' => intval($request['detail']['amount_items']),
                'nilai_jasa_crafter' => $jasa->salary,
                'jasa_reference' => $jasa->id,
            ]);

            foreach ($request->items as $value) {
                ProductionBarangDetail::create([
                    'production_id' => $productionQuery->id,
                    'item_status' => $value['status'],
                    'barang_id' => $value['status'] ? null : $value['id'],
                    'amount_item' => $value['qty'],
                    'cost_item' => $value['price'],
                    'total_cost' => $value['total_price'],
                    'item_name' => $value['item'],
                    'status' => false
                ]);
                if (!$value['status']) {
                    Barang::where('id', $value['id'])->decrement('stock', $value['qty']);
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
        $query = Production::query()->with(['crafter'])->latest()->where('delete_status', false);
        return response()->json([
            'status' => 'ok',
            'code' => 200,
            'message' => 'Data fetch successfully.',
            'data' => $query->paginate(15)
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
            if ($productionQuery->distribution_status) {
                return getResponseJson('Opps', 405, "Product sudah selesai distribusi", $productionQuery, false);
            }

            $jeniQuery = JenisProduct::first();
            Product::create([
                'code' => $productionQuery->code_production,
                'product_name' => $productionQuery->production_title,
                'comment' => 'form production',
                'qty' => 1,
                'cost_production' => $productionQuery->production_cost,
                'jenis_product_id' => $jeniQuery->id,
                'ref_production_id' => $productionQuery->id,
                'price' => $productionQuery->price_for_sale
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
                'nama' => $value->item_name,
                'harga' => $value->cost_item,
                'jumlah' => $value->amount_item,
                'total' => $value->total_cost,
                'status' => $value->item_status
            ];
        }
        $mergedDetails = array_merge($materialDetails);
        return getResponseJson('ok', 200, 'Data detail bahan baku', $mergedDetails, false);
    }

    public function delete($key)
    {
        DB::beginTransaction();
        try {
            $production = Production::find($key);
            if (!$production) {
                return getResponseJson('errors', 404, 'Data produksi tidak ditemukan', "", false);
            }
            if ($production->production_status !== 0 && $production->production_status !== false) {
                return getResponseJson(
                    'errors',
                    400,
                    'Hanya data dengan status produksi belum selesai yang bisa dihapus',
                    "",
                    false
                );
            }
            $production->update([
                'delete_status' => true,
                'deleted_at' => Carbon::now()
            ]);
            ProductionBarangDetail::where('production_id', $production->id)
                ->where('item_status', false)
                ->each(function ($detail) {
                    Barang::where('id', $detail->barang_id)
                        ->increment('stock', $detail->amount_item);
                });
            DB::commit();
            return getResponseJson('ok', 200, 'Produk berhasil dihapus', "", false);
        } catch (\Throwable $th) {
            DB::rollBack();
            return getResponseJson(
                'errors',
                500,
                'Terdapat kesalahan internal',
                "",
                $th->getMessage()
            );
        }
    }
}
