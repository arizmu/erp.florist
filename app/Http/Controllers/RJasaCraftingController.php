<?php

namespace App\Http\Controllers;

use App\Models\Production\Production;
use App\Models\Production\RefSeviceCharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $query = RefSeviceCharge::query();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'data fetch!',
            'data' => $query->paginate(15)
        ]);
    }

    public function jasaLayanan(Request $request)
    {
        $queryData = Production::with('crafter')->latest()
            ->get()->take($request->limit ?? 15);
        return getResponseJson('ok', 200, 'fetch data!', $queryData, false);
    }
}
