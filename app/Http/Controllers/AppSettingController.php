<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $validasiData = Validator::make($request->all(), [
            'file_logo' => ['required', 'type' => 'file', 'mimes:png,jpg'],
        ]);

        if ($validasiData->fails()) {
            return response()->json([
                'status' => 'error',
                'code' => 400,
                'message' => 'Validasi gagal',
                'errors' => $validasiData->errors()
            ], 400);
        }

        DB::beginTransaction();
        try {
            $query = AppSetting::first();
            $filePath = $query->foto ?? "";
            if ($request->hasFile('file_logo')) {
                $filePath = FileUpload($request->file('file_logo'), "logo/", "app-logo");
            }
            $arrayRequest = [
                'app_name' => $request->appName,
                'comment' => $request->comment,
                'alamat' => $request->address,
                'telpon' => $request->phone,
                'email' => $request->email,
                'foto' => $filePath // jika ada file logo, masukkan file_path ke field ini
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
