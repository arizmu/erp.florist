<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppSettingController extends Controller
{
    public function index()
    {
        return view('Pages.setting-index');
    }

    public function appFirst()
    {
        $query = AppSetting::first();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Data berhasil diambil',
            'data' => $query
        ]);
    }

    public function storeOrUpdate(Request $request)
    {
        DB::beginTransaction();
        try {
            $query = AppSetting::first();
            $arrayRequest = [
                'app_name' => $request->appName,
                'comment' => $request->comment,
                'alamat' => $request->address,
                'telpon' => $request->phone,
                'email' => $request->email,
            ];
            if ($query) {
                $query->update($arrayRequest);
            } else {
                AppSetting::create($arrayRequest);
            }
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Data berhasil diupdate',
                'data' => $arrayRequest
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Data gagal diupdate',
                'detail' => $th->getMessage()
            ], 500);
        }
    }
}
