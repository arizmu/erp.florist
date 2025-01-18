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
            // create product pre-order
            $estimasi = explodeEstimasi($request->production['estimasi']);
            $biayaMaterialProduksi = intval($request->production['cost']);
            $biayaJasaProduksi = intval($request->production['price']);
            $subtotalBiaya = $biayaJasaProduksi + $biayaMaterialProduksi;

            $queryProduction = Production::create([
                'code_production' => generateCodeProduction(),
                'production_title' => $request->production['title'],
                'production_date' => Carbon::now()->format('Y-m-d'),
                'production_staus' => false,
                'production_start' => $estimasi['startDate'],
                'production_end' => $estimasi['endDate'],
                'production_cost' => $biayaMaterialProduksi,
                'pegawai_id' => $request->production['crafter']
            ]);

            // details productions
            foreach ($request->items as $value) {
                if (!$value['item_status']) {
                    ProductionBarangDetail::create([
                        'production_id' => $queryProduction->id,
                        'barang_id' => $value['item_code'],
                        'amount_item' => $value['item_qty'],
                        'cost_item' => $value['item_price'],
                        'total_cost' => $value['item_total'],
                        'status' => false
                    ]);
                } else {
                    // ProductionOtherDetail::create([
                    //     'production_id' => $queryProduction->id,
                    //     'id' => $value['item_code'],
                    //     'item_name' => $value['item_name'],
                    //     'qty' => $value['item_qty'],
                    //     'cost' => $value['item_price'],
                    //     'total_cost' => $value['item_total'],
                    //     'comment' => $value['comment']
                    // ]);
                }
            }

            // move production product to product table
            // $queryProduct = Product::create([
            //     'product_name' => $queryProduction->production_title,
            //     'comment' => '',
            //     'qty' => 1,
            //     'jenis_product_id' => '',
            //     'img' => '',
            //     'ref_production_id' => $queryProduction->id,
            //     'price' => $queryProduction->production_cost + 25000
            // ]);

            // costumer
            $statusMemmber = $request->costumer['status'];
            $costumerId = "";
            if ($statusMemmber) {
                // $findCostumer = Costumer::find($request->costumer['id']);
                // $costumerId = $findCostumer->id;
                $costumerId = $$request->costumer['id'];
            } else {
                $costumerStore = Costumer::create([
                    'name' => $request->costumer['name'],
                    'jenis_kelamin' => $request->costumer['gender'] ? "L" : "P",
                    'alamat' => $request->costumer['address'],
                    'no_telp' => $request->costumer['phone'],
                    'email' => $request->costumer['email'],
                    'status' => false
                ]);
                $costumerId = $costumerStore->id;
            }

            // create transaksi pre-order 
            $totalPayment = $queryProduction->production_cost ?? 0;
            $queryTransaksi = Transaction::create([
                "costumer_id" => $costumerId,
                'code' => generateCodeTransaksi(),
                'transaction_date' => Carbon::now()->format('Y-m-d'),
                'total_payment' => $subtotalBiaya,
                'total_paid' => 0,
                'total_unpaid' => $subtotalBiaya,
                'status_transaction' => 'd',
                'preorder_status' => true
            ]);

            // create dtail transaction
            $jumlahItem = 1;
            $queryDetailTransaction = DetailsTransaction::create([
                'transaction_id' => $queryTransaksi->id,
                'order_status' => true,
                'production_id_or_product_id' => $queryProduction->id,
                'item_name' => $queryProduction->production_title,
                'amount_item' => $jumlahItem,
                'cost_item' => $queryProduction->production_cost ?? 0,
                'total_cost' => $queryProduction->production_cost ?? 0,
                'status' => false
            ]);

            DB::commit();
            return getResponseJson('success', 200, 'insert successfully!', $request->all(), false);
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
}
