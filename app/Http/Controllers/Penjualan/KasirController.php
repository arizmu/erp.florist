<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Models\Costumer;
use App\Models\Product\Product;
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
        // ->withInput(request()->all() ?? "");
    }

    public function kasir()
    {
        return view('Pages.penjualan.kasir.kasir-index');
    }


    public function proudctJson()
    {
        $query = Product::query()->orderBy('created_at', 'asc');
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
            $transaksiArray = [
                'code' => $this->genereateCodeTransaksi(),
                'transaction_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'total_payment' => $request['subtotal'],
                'total_paid' => 0,
                'total_unpaid' => $request['subtotal']
            ];
            $queryTransaksi = Transaction::create($transaksiArray);

            $detailsTransaksi = $request['items'];
            $datailOnTransaction = [];
            foreach ($detailsTransaksi as $item) {
                $datailOnTransaction[] = [
                    'transaction_id' => $queryTransaksi->id,
                    'order_status' => false,
                    'production_id_or_product_id' => $item['product_id'],
                    'item_name' => $item['product_name'],
                    'amount_item' => $item['product_qty'],
                    'cost_item' => $item['product_price'],
                    'total_cost' => $item['total_price'],
                    'status' => false
                ];
            }

            $queryTransaksi->details()->createMany($datailOnTransaction);
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
                'status' => 'error',
                'code' => 500,
                'message' => 'Data fetch failed',
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
            'nama' => 'required|string',
            'telpon' => 'required|numeric'
        ]);
        if ($validasi->fails()) {
            return getResponseJson('error', 400, 'bad Reqeust', null, $validasi->errors());
        }
        //

        DB::beginTransaction();
        try {
            $transaksi = Transaction::find($key);
            $totalPayment = $transaksi->total_payment;
            $totalPaid = $transaksi->total_paid;
            $totalUpaid = $transaksi->total_unpaid;
            $metodePayment = $request['metode_bayar'];
            $cashMoney = $request['jumlah_bayar'];
            $cashBack = $request['kembali'];

            $checkCostumer = $transaksi->costumer_id;
            if ($checkCostumer == null) {
                $getCs = $request['costumer'];
                $costumer = [
                    'name' => $getCs['nama'],
                    'no_telp' => $getCs['telpon'],
                    'alamat' => $getCs['alamat'],
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

                $transaksi->update([
                    'costumer_id' => $transaksi->costumer_id ?? $costumerId,
                    'total_paid' => $hitungTotalTerbayar >= $totalPayment ? $totalPayment : $hitungTotalTerbayar,
                    'total_unpaid' => $hitungTotalPiutang > 0 ? $hitungTotalPiutang : 0,
                    'status_transaction' => $cashMoney >= $totalPayment ? 's' : 'p',
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
}
