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
        DB::beginTransaction();
        try {
            $query = AppSetting::first();
            $arrayRequest = [
                'app_name' => $request->appName,
                'sub_title' => $request->sub_title,
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

    public function udpateLogo(Request $request)
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

        try {
            $logoFile = request()->file('file_logo');
            if (!$logoFile->isValid()) {
                return response()->json([
                    'status' => 'error',
                    'code' => 400,
                    'message' => 'File logo tidak valid'
                ], 400);
            }
            $filePath = FileUpload($logoFile, "logo/", "app-logo");
            $setting = AppSetting::first();
            $setting->foto = $filePath;
            $setting->save();

            return getResponseJson('success', 200, 'Logo saved successfully', $filePath, null);
        } catch (\Throwable $th) {
            DB::rollBack();
            return getResponseJson('error', 500, 'File gagal diupload', null, $th->getMessage());
        }
    }

    public function updateIcon(Request $request)
    {
        $validasiData = Validator::make($request->all(), [
            'icon' => ['required', 'type' => 'file', 'mimes:png,jpg'],
        ]);

        if ($validasiData->fails()) {
            return response()->json([
                'status' => 'error',
                'code' => 400,
                'message' => 'Validasi gagal',
                'errors' => $validasiData->errors()
            ], 400);
        }

        $iconFile = request()->file('icon');

        if (!$iconFile->isValid()) {
            return response()->json([
                'status' => 'error',
                'code' => 400,
                'message' => 'File icon tidak valid'
            ], 400);
        }
        $filePath = FileUpload($iconFile, "icon/", "app-icon");
        $setting = AppSetting::first();
        $setting->icon = $filePath;
        $setting->save();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Icon berhasil diupdate',
            'data' => $filePath // jika ada file icon, masukkan file_path ke field ini
        ]);
    }

    public function publicJson() {
        $query = AppSetting::first();
        return getResponseJson('ok', 200, 'success', $query, false);
    }
}
