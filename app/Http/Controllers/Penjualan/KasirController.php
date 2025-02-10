<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Costumer;
use App\Models\Product\Product;
use App\Models\Transaction\CostumeDetailTransaction;
use App\Models\Transaction\DetailsTransaction;
use App\Models\Transaction\PaymentTransaction;
use App\Models\Transaction\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KasirController extends Controller
{
    public function index()
    {
        $query = Transaction::query()->with('details')->orderBy('created_at', 'desc');
        return view('Pages.penjualan.transaksi-index', [
            'data' => $query->paginate(15),
            'chart' => [
                'pendapatan' => 0,
                'paid' => 0,
                'unpaid' => 0
            ]
        ]);
    }

    public function kasir()
    {
        return view('Pages.penjualan.kasir.kasir-index');
    }


    public function proudctJson()
    {
        $query = Product::query()->orderBy('created_at', 'asc')->where('qty', '>=', 1);
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Data fetch successfully',
            'data' => $query->paginate(15)
        ]);
    }

    public function prosesTransaksi(Request $request)
    {
        DB::beginTransaction();
        try {
            $detailsTransaksi = $request['items'];
            $datailOnTransaction = [];
            $subtotalPembayaran = 0;
            foreach ($detailsTransaksi as $item) {
                $product = Product::find($item['product_id']);
                $datailOnTransaction[] = [
                    'order_status' => false,
                    'production_id_or_product_id' => $item['product_id'],
                    'item_name' => $item['product_name'],
                    'amount_item' => $item['product_qty'],
                    'costume_status' => $item['product_costume'],
                    'costume_total' => $item['costume_total'],
                    'cost_item' => $item['product_price'],
                    'total_cost' => $item['total_price'],
                    'status' => false,
                    'code_product' => $product->code,
                    'details' => $item['product_costume_details']
                ];
                $totalPrice = intval($item['product_price']) * intval($item['product_qty']);
                $subtotalPembayaran += intval($totalPrice);

                if ($product->qty < $item['product_qty']) {
                    return response()->json([
                        'status' => 'Info',
                        'code' => 422,
                        'message' => 'Stok barang *' . $item['product_name'] . '* tidak mencukupi!.'
                    ], 422);
                }
                $product->qty -= $item['product_qty'];
                $product->save();
            }

            $transaksiArray = [
                'code' => $this->genereateCodeTransaksi(),
                'transaction_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'total_payment' => $subtotalPembayaran,
                'total_paid' => 0,
                'total_unpaid' => $subtotalPembayaran
            ];

            $queryTransaksi = Transaction::create($transaksiArray);
            // $queryTransaksi->details()->createMany($datailOnTransaction);
            // return $datailOnTransaction;
            foreach ($datailOnTransaction as $value) {
                $details = DetailsTransaction::create([
                    'transaction_id' => $queryTransaksi->id,
                    'order_status' => $value['order_status'],
                    'production_id_or_product_id' => $value['production_id_or_product_id'],
                    'item_name' => $value['item_name'],
                    'code_product' => $value['code_product'],
                    'amount_item' => $value['amount_item'],
                    'costume_status' => $value['costume_status'],
                    'costume_total' => $value['costume_total'],
                    'cost_item' => $value['cost_item'],
                    'total_cost' => $value['total_cost'],
                ]);
                
                foreach ($value['details'] as $val) {
                    CostumeDetailTransaction::create([
                        'details_transactions_id' => $details->id,
                        'status_item' => $val['status'],
                        'code_item' => $val['item_id'] ?? "",
                        'item_name' => $val['item_name'],
                        'comment' => $val['comment'],
                        'qty' => $val['item_qty'],
                        'price' => $val['item_price'],
                        'total_price' => $val['total'],
                    ]);
                    if (!$val['status']) {
                        $barang = Barang::find($val['item_id']);
                        $barang->stock -= $val['item_qty'];
                        $barang->save();
                    }
                }
            }
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Processing data is success.',
                'data' => [
                    'transaction_id' => $queryTransaksi->id,
                    'code' => $queryTransaksi->code
                ]
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'Errors',
                'code' => 500,
                'message' => 'Error processing transaction',
                'details' => $th->getMessage()
            ], 500);
        }
    }

    public function prosesBayar($key)
    {
        $query = Transaction::with('details', 'costumer', 'payment')->find($key);
        return view('Pages.penjualan.kasir.kasir-pembayaran', [
            'data' => $query,
            'key' => $key
        ]);
    }
    public function prosesBayarPost(Request $request, $key)
    {
        // add-validation
        $validasi = Validator::make($request->all(), [
            'metode_bayar' => 'required',
            'jumlah_bayar' => 'required|numeric',
            'kembali' => 'required|numeric',
            'costumer.nama' => 'required|string',
            'costumer.telpon' => 'required|numeric'
        ]);
        if ($validasi->fails()) {
            return getResponseJson('error', 400, 'bad Reqeust', $request->all(), $validasi->errors());
        }
        //

        DB::beginTransaction();
        try {
            $transaksi = Transaction::find($key);
            $totalPayment = $transaksi->total_payment;
            $totalPaid = $transaksi->total_paid;
            $totalUnpaid = $transaksi->total_unpaid;
            $metodePayment = $request['metode_bayar'];
            $cashMoney = $request['jumlah_bayar'];
            $cashBack = $request['kembali'];

            $checkCostumer = $transaksi->costumer_id;
            if ($checkCostumer == null) {
                $getCs = $request['costumer'];
                $costumer = [
                    'name' => $getCs['nama'],
                    'no_telp' => $getCs['telpon'],
                    'alamat' => $getCs['alamat'] ?? "-",
                    // 'jenis_kelamain' => 'L',
                    'email' => '',
                    'status' => false
                ];
                $querycostumer = Costumer::create($costumer);
                $costumerId = $querycostumer->id;
            } else {
                $costumerId = $transaksi->costumer_id;
            }

            $hitungTotalTerbayar = $totalPaid + $cashMoney;
            $hitungTotalPiutang = $totalPayment - $hitungTotalTerbayar;

            $checkPayment = $transaksi->payment;
            if ($checkPayment) {
                $paymentQuery = PaymentTransaction::create([
                    'factur_number' => $this->generateFactur(),
                    'transaction_id' => $transaksi->id,
                    'payment_method' => $metodePayment,
                    'total_payment' => $totalPayment,
                    'total_paid' => $cashMoney,
                    'total_unpaid' => $hitungTotalPiutang > 0 ? $hitungTotalPiutang : 0,
                    'total_cashback' => $cashBack,
                ]);

                $cekTotalUnpaid = $hitungTotalPiutang > 0 ? $hitungTotalPiutang : 0;
                $transaksi->update([
                    'costumer_id' => $transaksi->costumer_id ?? $costumerId,
                    'total_paid' => $hitungTotalTerbayar >= $totalPayment ? $totalPayment : $hitungTotalTerbayar,
                    'total_unpaid' => $cekTotalUnpaid,
                    // 'status_transaction' => $cashMoney >= $totalPayment ? 's' : 'p',
                    'status_transaction' => $hitungTotalPiutang > 0 ? 'p' : 's'
                ]);
            } else {
                $paymentQuery =  PaymentTransaction::create([
                    'factur_number' => $this->generateFactur(),
                    'transaction_id' => $transaksi->id,
                    'payment_method' => $metodePayment,
                    'total_payment' => $totalPayment,
                    'total_paid' => $cashMoney,
                    'total_cashback' => $cashBack,
                    'total_unpaid' => $cashBack,
                ]);

                $transaksi->update([
                    'costumer_id' => $transaksi->costumer_id ?? $costumerId,
                    'total_paid' => $cashMoney >= $totalPayment ? $totalPayment : $cashMoney,
                    'total_unpaid' => $hitungTotalPiutang > 0 ? $hitungTotalPiutang : 0,
                    'costumer_id' => $querycostumer->id,
                    'status_transaction' => $cashMoney >= $totalPayment ? 's' : 'p',
                ]);
            }

            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'proses pembayaran berhasil',
                'data' => [
                    'transaksi_id' => $transaksi->id,
                    'payment_id' => $paymentQuery->id,
                    'factur_number' => $this->generateFactur(),
                ]
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'proses pembayaran gagal',
                'details' => $th->getMessage()
            ], 500);
        }
    }

    public function generateFactur()
    {
        $code = 'FTR' . Carbon::now()->format('ym') . '-' . rand(000000, 999999);
        return $code;
    }

    public function genereateCodeTransaksi()
    {
        $code = 'TRX' . Carbon::now()->format('ym') . '-' . rand(000000, 999999);
        return $code;
    }

    public function transaksiDetail($key)
    {
        $transaksi = Transaction::where('id', $key)->with('details', 'costumer')->first();
        return view('Pages.penjualan.kasir.kasir-detail', compact('key', 'transaksi'));
    }

    public function invoice($transaksi_id, $invoice_id)
    {
        $queryTransaksi = Transaction::with(['details', 'costumer', 'payment' => function ($query) use ($invoice_id) {
            $query->where('id', $invoice_id);
        }])->find($transaksi_id);
        return view('Pages.penjualan.invoice', ['data' => $queryTransaksi]);
    }

    public function bbCostume()
    {
        $queryData = Barang::when(request()->search, function ($query) {
            $query->where('nama_barang', 'like', '%' . request()->search . '%');
        })->get()->take(25);
        return response()->json([
            'status' => 'ok',
            'data' => $queryData
        ]);
    }
}
