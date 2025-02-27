<?php

namespace App\Http\Controllers;

use App\Models\Transaction\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{

    public function PdfExportPenjualan(Request $request)
    {
        $data = Transaction::query()->isDelete(false)->with('details', 'costumer')->latest()
            ->when($request->estimasi, function ($query) use ($request) {
                $tanggal = explode("to", $request->estimasi);
                $tanggalStart = Carbon::parse($tanggal[0]);
                $tanggalEnd = count($tanggal) > 1 ? Carbon::parse($tanggal[1]) : $tanggalStart;
                $query->whereBetween('transaction_date', [$tanggalStart->format('Y-m-d'), $tanggalEnd->format('Y-m-d')]);
            });

        $totalPenjualan = 0;
        $totalPenerimaan = 0;
        $totalPiutang = 0;
        foreach ($data->get() as  $value) {
            $totalPenjualan += intval($value->total_payment);
            $totalPenerimaan += intval($value->total_paid);
            $totalPiutang += intval($value->total_unpaid);
        }
        $dataOutput = [
            'data' => $data->get(),
            'totalPenjualan' => $totalPenjualan,
            'totalPenerimaan' => $totalPenerimaan,
            'totalPiutang' => $totalPiutang
        ];

        $pdf = Pdf::loadView('pdf.pdf-report-transaksi', [
            'data' => $dataOutput,
            'title' => 'Laporan Penjualan',
            'estimasi' => $request->estimasi,
            ''
        ]);
        return $pdf->stream('report-transaksi' . $request->estimasi);
        // return $dataOutput;
    }

    public function laporanPenjualanJson(Request $request)
    {
        $data = Transaction::query()->isDelete(false)->with('details', 'costumer')->latest()
            ->when($request->estimasi, function ($query) use ($request) {
                $tanggal = explode("to", $request->estimasi);
                $tanggalStart = Carbon::parse($tanggal[0]);
                $tanggalEnd = count($tanggal) > 1 ? Carbon::parse($tanggal[1]) : $tanggalStart;
                $query->whereBetween('transaction_date', [$tanggalStart->format('Y-m-d'), $tanggalEnd->format('Y-m-d')]);
            })->paginate($request->range ? $request->range : 15);
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'pagination' => [
                'total' => $data->total(),
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage()
            ]
        ], 200);
    }
    public function laporanPenjualanLayout()
    {
        return view('Reports.report-penjualan');
    }
}
