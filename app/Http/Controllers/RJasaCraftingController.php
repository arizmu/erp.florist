<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Production\Production;
use App\Models\Production\RefSeviceCharge;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class RJasaCraftingController extends Controller
{
    public function index()
    {
        return view('Pages.Jasalayanan.ref-jasa-index');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $query = RefSeviceCharge::create([
                'title' => $request->referensi,
                'min_cost' => $request->nilai_min,
                'max_cost' => $request->nilai_max,
                'salary' => $request->salary
            ]);
            Db::commit();
            return response()->json([
                'status' => 'success',
                'code' => 201,
                'message' => 'data created!',
                'data' => $query
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'storing data failed!',
                'details' => $th->getMessage()
            ], 500);
        }
    }
    public function update(Request $request, $key)
    {
        DB::beginTransaction();
        try {
            $query = RefSeviceCharge::find($key);
            $query->update([
                'title' => $request->referensi,
                'min_cost' => $request->nilai_min,
                'max_cost' => $request->nilai_max,
                'salary' => $request->salary
            ]);
            Db::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'data updated!',
                'data' => $query
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'updated data failed!',
                'details' => $th->getMessage()
            ], 500);
        }
    }
    public function delete($key)
    {
        DB::beginTransaction();
        try {
            $query = RefSeviceCharge::find($key);
            $query->delete();
            Db::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'data deleted!',
                'data' => $query
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'deleted data failed!',
                'details' => $th->getMessage()
            ], 500);
        }
    }

    public function getJson()
    {
        $query = RefSeviceCharge::when(request()->keywords, function ($key) {
            $key->where('title', 'like', '%' . request()->keywords . '%');
        })->latest();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'data fetch!',
            'data' => $query->paginate(15),
            'request' => request()->all()
        ]);
    }

    public function jasaLayanan(Request $request)
    {
        $queryData = Production::with('crafter')
            ->when($request->estimasi, function ($query) use ($request) {
                $tanggal = explode("to", $request->estimasi);
                $tanggalStart = Carbon::parse($tanggal[0]);
                $tanggalEnd = count($tanggal) > 1 ? Carbon::parse($tanggal[1]) : $tanggalStart;
                $query->whereBetween('production_date', [$tanggalStart->format('Y-m-d'), $tanggalEnd->format('Y-m-d')]);
            })
            ->orderBy('created_at', 'desc')->paginate($request->range ?? 15);
        return getResponseJson('ok', 200, 'fetch data!', $queryData, false);
    }

    public function exportPDF(Request $request)
    {
        $crafter = Pegawai::find($request->crafter);
        $queryData = Production::with('crafter')->isDelete(false)
            ->when($request->estimasi, function ($query) use ($request) {
                $tanggal = explode("to", $request->estimasi);
                $tanggalStart = Carbon::parse($tanggal[0]);
                $tanggalEnd = count($tanggal) > 1 ? Carbon::parse($tanggal[1]) : $tanggalStart;
                $query->whereBetween('production_date', [$tanggalStart->format('Y-m-d'), $tanggalEnd->format('Y-m-d')]);
            })
            ->when($request->crafter, function ($query) use ($request) {
                $query->where('pegawai_id', $request->crafter);
            });

        $data = $queryData->get();
        $totalHarga = 0;
        $totalJasa = 0;
        foreach ($data as $item) {
            if ($item->production_status === 1) {
                $totalHarga += $item->price_for_sale;
                $totalJasa += $item->nilai_jasa_crafter;
            }
        }
        
        // hitung jumlah data production 
        $jumlahData = $queryData->count();
        $jumlahSelesai = $queryData->where('production_status', true)->count();

        $pdf = Pdf::loadView('pdf.report-jasa-pelayanan', [
            'data' => $data,
            'jumlahProduksi' => $jumlahData,
            'jumlahSelesai' => $jumlahSelesai,
            'estimasi' => $request->estimasi,
            'crafter' => $request->crafter ? $crafter->pegawai_name : 'Semua Crafter',
            'title' => 'Laporan Jasa Pelayanan',
            'totalHarga' => $totalHarga,
            'totalJasa' => $totalJasa
        ]);

        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream('jasa-pelaya.pdf');
    }
}
