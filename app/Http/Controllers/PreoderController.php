<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Costumer;
use App\Models\Pegawai;
use App\Models\Product\Product;
use App\Models\Production\Production;
use App\Models\Transaction\DetailsTransaction;
use App\Models\Transaction\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
            $queryProduction = Production::create([
                'code_production' => generateCodeProduction(),
                'production_title' => $request->production['title'],
                'production_date' => Carbon::now()->format('Y-m-d'),
                'production_staus' => false,
                'production_start' => '',
                'production_end' => '',
                'production_cost' => '',
                'pegawai_id' => ''
            ]);

            // move production product to product table
            $queryProduct = Product::create([
                'product_name' => $queryProduction->production_title,
                'comment' => '',
                'qty' => 1,
                'jenis_product_id' => '',
                'img' => '',
                'ref_production_id' => $queryProduction->id,
                'price' => $queryProduction->production_cost + 25000
            ]);

            // costumer
            $statusMemmber = $request->costumers['status'];
            $costumerId = "";
            if ($statusMemmber) {
                // $findCostumer = Costumer::find($request->costumer['id']);
                // $costumerId = $findCostumer->id;
                $costumerId = $$request->costumer['id'];
            } else {
                $costumerStore = Costumer::create([
                    'name'=> $request->costumer['name'],
                    'jenis_kelamin' => $request->costumer['gender'] ? "L" :"P",
                    'alamat' => $request->costumer['address'],
                    'no_telp' => $request->costumer['phone'],
                    'email' => $request->costumer['email'],
                    'status' => false
                ]);
                $costumerId = $costumerStore->id;
            }

            // create transaksi pre-order 
            $queryTransaksi = Transaction::create([
                "costumer_id" => $costumerId,
                'code' => generateCodeTransaksi(),
                'transacion_date' => '',
                'total_payment' => '',
                'total_paid' => '',
                'total_unpaid' => '',
                'status_transaction' => ''
            ]);

            // create dtail transaction
            $queryDetailTransaction = DetailsTransaction::create([
                'transaction_id' => $queryTransaksi->id,
                'order_status' => '',
                'production_id_or_product_id' => '',
                'item_name' => '',
                'amount_item' => '',
                'cost_item' => '',
                'total_cost' => '',
                'status' => ''
            ]);

            DB::commit();
            return getResponseJson('success', 200,'insert successfully!', $request->all(), false);
        } catch (\Throwable $th) {
            DB::rollBack();
            return getResponseJson('errors', 500, 'internal server error', $request->all(), $th->getMessage());
        }
    }


}
