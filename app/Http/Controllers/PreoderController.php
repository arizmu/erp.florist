<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Costumer;
use App\Models\Pegawai;
use App\Models\Product\Product;
use App\Models\Production\Production;
use App\Models\Production\ProductionBarangDetail;
use App\Models\production\ProductionOtherDetail;
use App\Models\Transaction\DetailsTransaction;
use App\Models\Transaction\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PreoderController extends Controller
{
    public function formLayout()
    {
        return view('Pages.penjualan.pre-order.pre-order-form');
    }

    public function getMaterial()
    {
        $query = Barang::query()->when(request()->key, function ($iresult) {
            $iresult->where('nama_barang', 'like', '%' . request()->key . '%');
        })->take(request()->key ? 15 : 5)->get();
        return getResponseJson('success', 200, 'data fetch successfully', $query, 0);
    }

    public function getCrafter()
    {
        $query = getPegawai()->get();
        return getResponseJson('success', 200, 'data fetch successfully', $query, 0);
    }

    public function getReferensiJasa()
    {
        $query = getReferensiJasa()->get();
        return getResponseJson('success', 200, 'data fetch successfully', $query, 0);
    }

    public function preOrderStore(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'items.*' => 'required',
            'production.title' => 'required',
            'production.crafter' => 'required',
            'production.jasa' => 'required',
            'production.estimasi' => 'required',
            'production.cost' => 'required',
            'production.price' => 'required',
            'production.subtotal' => 'required',
            'costumer.name' => 'required',
            'costumer.gender' => 'required',
            'costumer.address' => '',
            'costumer.phone' => 'required',
            'costumer.email' => '',
            'costumer.sosmsed' => '',
        ]);
        if ($validation->fails()) {
            return getResponseJson('error', 400, 'validation failed', $request->all(), $validation->errors()->all());
        }


        DB::beginTransaction();
        try {
            //produksi
            $productionFunc = $this->produksi([
                'xproduksi' => $request->production,
                'xitems' => $request->items
            ]);
            $productionId = $productionFunc['produksi_id'];
            $productionName = $productionFunc['produk_name'];
            $productionBiaya = intval($productionFunc['biaya_produksi']);
            $biayaJasaProduksi = intval($request->production['price']);
            $subtotalBiaya = $biayaJasaProduksi + $productionBiaya;

            // costumer
            $costumerFunc = $this->costumer($request->costumer);
            $costumerId = $costumerFunc['costumer_id'];
            $pointStatus = $costumerFunc['point_status'];
            $point = $costumerFunc['point'];

            // transaksi 
            $queryTransaksi = Transaction::create([
                "costumer_id" => $costumerId,
                'code' => generateCodeTransaksi(),
                'transaction_date' => Carbon::now()->format('Y-m-d'),
                'total_payment' => intval($subtotalBiaya),
                'total_paid' => intval($point) ?? 0,
                'total_unpaid' => $pointStatus ? intval($subtotalBiaya) - intval($point) : intval($subtotalBiaya),
                'status_transaction' => 'd',
                'preorder_status' => true
            ]);

            // detail transaksi
            $jumlahItem = 1;
            DetailsTransaction::create([
                'transaction_id' => $queryTransaksi->id,
                'order_status' => true,
                'production_id_or_product_id' => $productionId,
                'item_name' => $productionName,
                'amount_item' => $jumlahItem,
                'cost_item' => $productionBiaya,
                'total_cost' => $jumlahItem * $productionBiaya,
                'status' => false
            ]);

            DB::commit();
            return getResponseJson('success', 200, 'insert successfully!', [
                'transaction_id' => $queryTransaksi->id,
                'jumlah_item' => $jumlahItem,
            ], false);
        } catch (\Throwable $th) {
            DB::rollBack();
            $errorId = Str::uuid()->toString();
            Log::error([
                'error_id' => $errorId,
                'error_exception' => $th->getMessage(),
                'error_line' => $th->getLine(),
            ]);

            return getResponseJson('errors', 500, 'internal server error', $request->all(), ['error_id' => $errorId]);
        }
    }

    public function findCostumer($key)
    {
        $query = Costumer::where('no_telp', $key)->first();
        return getResponseJson('ok', 200, 'costumer found', $query, false);
    }

    public function costumer($costumer)
    {
        $costumerID = "";
        $point = 0;
        $point_use = $costumer['point_use'] ?? false;

        if ($costumer['status']) {
            $costumerQuery = Costumer::find($costumer['id']);
            $costumerID = $costumerQuery->id;
            if ($point_use) {
                $point = $costumerQuery['point'];
                // $point_use = $costumer['point_use'];
            }
        } else {
            $costumerStore = Costumer::create([
                'name' => $costumer['name'],
                'jenis_kelamin' => $costumer['gender'] ? "L" : "P",
                'alamat' => $costumer['address'],
                'no_telp' => $costumer['phone'],
                'email' => $costumer['email'],
                'status' => false,
                'point' => 0,
                'sosmed' => $costumer['sosmed']
            ]);
            $costumerID = $costumerStore->id;
        }
        return [
            'status' => $costumer['status'],
            'point' => $point,
            'point_status' => $point_use,
            'costumer_id' => $costumerID
        ];
    }

    public function produksi($xproduction)
    {
        $detail = $xproduction['xproduksi'];
        $estimasi = explodeEstimasi($detail['estimasi']);
        $biayaMaterialProduksi = intval($detail['cost']);

        $queryProduksi = Production::create([
            'code_production' => generateCodeProduction(),
            'production_title' => $detail['title'],
            'production_date' => Carbon::now()->format('Y-m-d'),
            'production_staus' => false,
            'production_start' => $estimasi['startDate'],
            'production_end' => $estimasi['endDate'],
            'production_cost' => $biayaMaterialProduksi,
            'pegawai_id' => $detail['crafter']
        ]);

        $items = $xproduction['xitems'];
        foreach ($items as $value) {
            if (!$value['item_status']) {
                ProductionBarangDetail::create([
                    'production_id' => $queryProduksi->id,
                    'barang_id' => $value['item_code'],
                    'amount_item' => $value['item_qty'],
                    'cost_item' => $value['item_price'],
                    'total_cost' => $value['item_total'],
                    'status' => false
                ]);
            } else {
                ProductionOtherDetail::create([
                    'production_id' => $queryProduksi->id,
                    'id' => $value['item_code'],
                    'item_name' => $value['item_name'],
                    'qty' => $value['item_qty'],
                    'cost' => $value['item_price'],
                    'total_cost' => $value['item_total'],
                    'comment' => $value['comment']
                ]);
            }
        }

        return [
            'produksi_id' => $queryProduksi->id,
            'biaya_produksi' => $biayaMaterialProduksi,
            'produk_name' => $queryProduksi->production_title
        ];
    }
}
