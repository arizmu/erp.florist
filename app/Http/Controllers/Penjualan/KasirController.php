<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use App\Models\Barang;
use App\Models\Costumer;
use App\Models\Product\Product;
use App\Models\Transaction\CostumeDetailTransaction;
use App\Models\Transaction\DetailsTransaction;
use App\Models\Transaction\PaymentTransaction;
use App\Models\Transaction\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KasirController extends Controller
{
    public function index()
    {
        $query = Transaction::where('deleted_status', 0)->with('details')->orderBy('created_at', 'desc');
        return view('Pages.penjualan.transaksi-index', [
            'data' => $query->paginate(15),
            'chart' => [
                'pendapatan' => 0,
                'paid' => 0,
                'unpaid' => 0
            ]
        ]);
    }

    public function transaksiJsonIndex(Request $request)
    {
        $query = Transaction::query()->isDelete(false)->with('details', 'costumer')->latest()
            ->when($request->keywords, function ($q) use ($request) {
                $q->where(function ($subQuery) use ($request) {
                    $subQuery->where('code', 'LIKE', '%' . $request->keywords . '%')
                        ->orWhereHas('costumer', function ($costumerQuery) use ($request) {
                            $costumerQuery->where('name', 'LIKE', '%' . $request->keywords . '%')
                                ->orWhere('no_telp', 'LIKE', '%' . $request->keywords . '%');
                        });
                });
            })->when(in_array($request->status, ['d', 's', 'p']), function ($subQuery) use ($request) {
                $subQuery->where('status_transaction', $request->status);
            });

        $tanggal = $request->estimasi ? explode("to", $request->estimasi) : [Carbon::now()->toDateString()];
        $tanggalStart = Carbon::parse($tanggal[0])->format('Y-m-d');
        $tanggalEnd = isset($tanggal[1]) ? Carbon::parse($tanggal[1])->format('Y-m-d') : $tanggalStart;
        $query->whereBetween('transaction_date', [$tanggalStart, $tanggalEnd]);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Data fetch successfully',
            'data' => $query->paginate($request->range ?? 15)
        ]);
    }

    public function kasir()
    {
        return view('Pages.penjualan.kasir.kasir-index');
    }


    public function proudctJson(Request $request)
    {
        $query = Product::query()->isDelete(false)->where('qty', '>=', 1)->latest();
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

    public function prosesTransaksi(Request $request)
    {
        // return $request->all();
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
                $costumeTotal = intval($item['costume_total']);
                $productPrice = intval($item['product_price']);
                $productQty = intval($item['product_qty']);
                $productTotal = $costumeTotal + $productPrice;
                $totalPrice = $productTotal * $productQty;
                $subtotalPembayaran += $totalPrice;

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
        $transaksi = Transaction::where('id', $key)->with('details', 'costumer', 'payment')->first();
        return view('Pages.penjualan.kasir.kasir-detail', compact('key', 'transaksi'));
    }

    public function invoice($transaksi_id, $invoice_id)
    {
        $queryTransaksi = Transaction::with(['details', 'costumer', 'payment' => function ($query) use ($invoice_id) {
            $query->where('id', $invoice_id);
        }])->find($transaksi_id);

        $app = AppSetting::first();
        $headers = [
            'toko' => $app->app_name,
            'alamat' => $app->alamat,
            'telpon' => $app->telpon,
            'logo' => $app->foto
        ];

        return view('Pages.penjualan.invoice', [
            'data' =>   $queryTransaksi,
            'headers' => $headers
        ]);
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

    public function archiveTransaksi(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $queryTransaksi = Transaction::find($id);
            if ($queryTransaksi->preorder_status) {
                $details = $queryTransaksi->details()->where('order_status', true)->get();
            } else {
                $details = $queryTransaksi->details()->where('order_status', false)->get();
                foreach ($details as $value) {
                    // return $value;
                    if ($value->costume_status) {
                        $costumeDetail = CostumeDetailTransaction::where('details_transactions_id', $value->id)->where('status_item', false)->get();

                        foreach ($costumeDetail as $costume) {
                            $barang = Barang::find($costume->code_item);
                            $barang->stock += $costume->qty;
                            $barang->save();
                        }
                    }
                    $returnProduct = Product::find($value->production_id_or_product_id);
                    $returnProduct->qty += $value->amount_item;
                    $returnProduct->save();
                }
            }
            $queryTransaksi->deleted_status = true;
            $queryTransaksi->deleted_at = Carbon::now();
            $queryTransaksi->deleted_by_user = Auth::user()->name;
            $queryTransaksi->save();
            DB::commit();
            return getResponseJson('Success', 200, 'Data archive successful', $request->all(), false);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return getResponseJson('Error', 500, 'Data archive failed', $request->all(), $th->getMessage());
        }
    }

    public function scanBarcode(Request $request)
    {
        $query = Product::where('code', $request->barcode)
            ->isDelete(false)
            ->where('qty', '>=', 1)
            ->first();
        if (!$query) {
            return response()->json([
                'status' => 'error',
                'message' => 'Barang tidak ditemukan',
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $query,
        ], 200);
    }


    public function dashTransactions(Request $request)
    {
        $query = Transaction::query()->isDelete(false)->where(function ($result) use ($request) {
            $tanggal = $request->estimasi ? explode("to", $request->estimasi) : [Carbon::now()->toDateString()];
            $tanggalStart = Carbon::parse($tanggal[0])->format('Y-m-d');
            $tanggalEnd = isset($tanggal[1]) ? Carbon::parse($tanggal[1])->format('Y-m-d') : $tanggalStart;
            $result->whereBetween('transaction_date', [$tanggalStart, $tanggalEnd]);
        })->get();

        $data = [
            'total_paid' => $query->sum('total_paid'),
            'total_unpaid' => $query->sum('total_unpaid'),
            'total_penjualan' => $query->sum('total_payment'),
        ];
        return response()->json($data);
    }

    public function pointUseValidation()
    {
        try {
            $transaksiQuery = Transaction::find(request()->key);
            if ($transaksiQuery->point > 0) {
                // if true, the transaction can't use point costumer
                return response()->json([
                    'status' => 'error',
                    'message' => 'Maaf, transaksi ini dapat menggunakan poin kustomer'
                ], 403);
            } else {
                // if false, point member cant use to pay
                return response()->json([
                    'status' => 'success',
                    'message' => 'Point Members dapat digunakan!'
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan',
                'details' => $th->getMessage()
            ], 500);
        }
    }

    // public function prosesBayarPost(Request $request, $key)
    // {
    //     return $request->all();
    //     // add-validation
    //     $validasi = Validator::make($request->all(), [
    //         'metode_bayar' => 'required',
    //         'jumlah_bayar' => 'required|numeric',
    //         'kembali' => 'required|numeric',
    //         'costumer.nama' => 'required|string',
    //         'costumer.telpon' => 'required|numeric'
    //     ]);
    //     if ($validasi->fails()) {
    //         return getResponseJson('error', 400, 'bad Reqeust', $request->all(), $validasi->errors());
    //     }
    //     //

    //     DB::beginTransaction();
    //     try {
    //         $transaksi = Transaction::find($key);
    //         $totalPayment = $transaksi->total_payment;
    //         $totalPaid = $transaksi->total_paid;
    //         $totalUnpaid = $transaksi->total_unpaid;
    //         $metodePayment = $request['metode_bayar'];
    //         $cashMoney = $request['jumlah_bayar'];
    //         $cashBack = $request['kembali'];

    //         $checkCostumer = $transaksi->costumer_id;
    //         // if ($checkCostumer == null) {
    //         //     $getCs = $request['costumer'];
    //         //     $costumer = [
    //         //         'name' => $getCs['nama'],
    //         //         'no_telp' => $getCs['telpon'],
    //         //         'alamat' => $getCs['alamat'] ?? "-",
    //         //         // 'jenis_kelamain' => 'L',
    //         //         'email' => '',
    //         //         'status' => false
    //         //     ];
    //         //     $querycostumer = Costumer::create($costumer);
    //         //     $costumerId = $querycostumer->id;
    //         // } else {
    //         //     $costumerId = $transaksi->costumer_id;
    //         // }

    //         $hitungTotalTerbayar = $totalPaid + $cashMoney;
    //         $hitungTotalPiutang = $totalPayment - $hitungTotalTerbayar;

    //         $checkPayment = $transaksi->payment;
    //         $this->costumerMember($request->costumer, $request->pembayaran, $checkPayment, $checkCostumer);
    //         if ($checkPayment) {
    //             $paymentQuery = PaymentTransaction::create([
    //                 'factur_number' => $this->generateFactur(),
    //                 'transaction_id' => $transaksi->id,
    //                 'payment_method' => $metodePayment,
    //                 'total_payment' => $totalPayment,
    //                 'total_paid' => $cashMoney,
    //                 'total_unpaid' => $hitungTotalPiutang > 0 ? $hitungTotalPiutang : 0,
    //                 'total_cashback' => $cashBack,
    //             ]);

    //             $cekTotalUnpaid = $hitungTotalPiutang > 0 ? $hitungTotalPiutang : 0;
    //             $transaksi->update([
    //                 'costumer_id' => $transaksi->costumer_id ?? $costumerId,
    //                 'total_paid' => $hitungTotalTerbayar >= $totalPayment ? $totalPayment : $hitungTotalTerbayar,
    //                 'total_unpaid' => $cekTotalUnpaid,
    //                 // 'status_transaction' => $cashMoney >= $totalPayment ? 's' : 'p',
    //                 'status_transaction' => $hitungTotalPiutang > 0 ? 'p' : 's'
    //             ]);
    //         } else {
    //             $paymentQuery =  PaymentTransaction::create([
    //                 'factur_number' => $this->generateFactur(),
    //                 'transaction_id' => $transaksi->id,
    //                 'payment_method' => $metodePayment,
    //                 'total_payment' => $totalPayment,
    //                 'total_paid' => $cashMoney,
    //                 'total_cashback' => $cashBack,
    //                 'total_unpaid' => $cashBack,
    //             ]);

    //             $transaksi->update([
    //                 'costumer_id' => $transaksi->costumer_id ?? $costumerId,
    //                 'total_paid' => $cashMoney >= $totalPayment ? $totalPayment : $cashMoney,
    //                 'total_unpaid' => $hitungTotalPiutang > 0 ? $hitungTotalPiutang : 0,
    //                 'costumer_id' => $querycostumer->id,
    //                 'status_transaction' => $cashMoney >= $totalPayment ? 's' : 'p',
    //             ]);
    //         }

    //         DB::commit();
    //         return response()->json([
    //             'status' => 'success',
    //             'code' => 200,
    //             'message' => 'proses pembayaran berhasil',
    //             'data' => [
    //                 'transaksi_id' => $transaksi->id,
    //                 'payment_id' => $paymentQuery->id,
    //                 'factur_number' => $this->generateFactur(),
    //             ]
    //         ], 200);
    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         return response()->json([
    //             'status' => 'error',
    //             'code' => 500,
    //             'message' => 'proses pembayaran gagal',
    //             'details' => $th->getMessage()
    //         ], 500);
    //     }
    // }

    // public function costumerMember($costumer, $payment, $checkPayment, $checkCostumer) {}

    public function prosesBayarPost(Request $request, $key)
    {
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

        DB::beginTransaction();
        try {
            $payment = [
                'metode' => $request->metode_bayar,
                'total' => $request->pembayaran['subtotal'],
                'paid' => 0,
                'unpaid' => $request->pembayaran['total_bayar'],
                'pay' => intval($request->jumlah_bayar),
            ];
            $discounts = [
                'status' => $request->pembayaran['discount']['status'] == true ? true : false,
                'percent' => $request->pembayaran['discount']['persen'] ?? 0,
                'value' => $request->pembayaran['discount']['nilai'] ?? 0,
            ];
            $costumer = [
                'name' => $request->costumer['nama'],
                'jk' => 'L',
                'telpon' => $request->costumer['telpon'],
                'alamat' => $request->costumer['alamat'],
                'email' => $request->costumer['email'] ?? '',
                'status' => false,
                'point' => $request->pembayaran['point']['nilai'],
                'point_use' => $request->pembayaran['point']['status'] == true ? true : false,
            ];

            $transaksi = Transaction::find($key);
            $transaksiPoint = $transaksi->point > 0 ? false : true; // check point use
            $costumerData = $this->costumerMembers($costumer, $transaksiPoint, $payment['total']);
            // return $costumerData;
            $subtotal = $transaksi->total_payment;
            $paid = $transaksi->total_paid;
            $unpaid = intval($transaksi->total_unpaid);
            $bayar = $payment['pay'];
            $discount = intval($discounts['value']);
            $pointMember = intval($costumer['point']);

            if ($transaksi->discount > 0) {
                $discount = 0;
            }
            if ($transaksi->point > 0) {
                $pointMember = 0;
            }

            $totalTerbayar = $discount + $pointMember + $bayar;
            $sisaBayar = $unpaid - $totalTerbayar;

            $qeryPembayaran = PaymentTransaction::create([
                'transaction_id' => $transaksi->id,
                'total_payment' => $transaksi->total_payment,
                'total_paid' => $totalTerbayar,
                'total_unpaid' => $sisaBayar > 0 ? $sisaBayar : 0,
                'total_cashback' => 0,
                'factur_number' => $this->generateFactur(),
                'payment_method' => $payment['metode']
            ]);

            //
            $trTerbayar = $paid + $totalTerbayar;
            $status = $subtotal <= $trTerbayar ? "s" : "p";
            $discountVal = $discounts['status'] ? $discount : $transaksi->discount;

            $transaksi->update([
                'costumer_id' => $costumerData,
                'total_paid' => $trTerbayar >= $subtotal ? $subtotal : $trTerbayar,
                'total_unpaid' => $sisaBayar > 0 ? $sisaBayar : 0,
                'discount' => $discountVal,
                'point' => intval($pointMember ?? 0),
                'status_transaction' =>  $status
            ]);

            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'proses pembayaran berhasil',
                'data' => [
                    'transaksi_id' => $transaksi->id,
                    'payment_id' => $qeryPembayaran->id,
                    'factur_number' => $qeryPembayaran->factur_number,
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

    public function costumerMembers($data, $statusPoint, $totalTransaction)
    {
        $costumer = Costumer::where('no_telp', $data['telpon'])->first();
        if (!$costumer) {
            $query = Costumer::create([
                'name' => $data['name'],
                'jenis_kelamin' => $data['jk'],
                'alamat' => $data['alamat'],
                'no_telp' => $data['telpon'],
                'email' => $data['email'] ?? '',
                'status' => false,
                'point_member' => $this->createPointMembers($totalTransaction)
            ]);
            return $query->id;
        } else {
            if ($statusPoint && $data['point_use']) {
                $costumer->update([
                    'point_member' => 0
                ]);
            } else {
                $costumer->update([
                    'point_member' => $costumer->point_members + $this->createPointMembers($totalTransaction)
                ]);
            }
            return $costumer->id;
        }
    }

    public function createPointMembers($totalTransaction)
    {
        $point = 2500;
        $kelipatan = 100000;
        $totalTransaksi = intval($totalTransaction);
        $pointTotal = 0;
        if ($totalTransaksi < $kelipatan) {
            return $pointTotal;
        } else {
            $pointTotal = $point * floor($totalTransaksi / $kelipatan);
            return $pointTotal;
        }
    }

    public function checkDiscountStatus($id)
    {
        try {
            $query = Transaction::find($id);
            if ($query->discount > 0) {
                $data = [
                    'status' => true,
                    'discount' => $query->discount,
                    'info' => 'Potongan discount tidak dapat diproses!!!',
                ];
            } else {
                $data = [
                    'status' => false,
                    'discount' => 0,
                    'info' => 'Potongan discount dapat diproses!!!',
                ];
            }

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'gagal mengambil data',
                'details' => $th->getMessage()
            ], 500);
        }
    }
}
