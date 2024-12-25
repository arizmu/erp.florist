<?php

namespace App\Http\Controllers\management;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('Pages.pegawai.pegawai-index');
    }

    public function store(Request $request)
    {
        try {
            $query = Pegawai::create([
                'no_identitas' => $request->no_identitas,
                'pegawai_name' => $request->nama,
                'gender' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'telpon' => $request->telpon,
                'email' => $request->email,
                'file_photo' => ''
            ]);
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Data berhasil disimpan',
                'data' => $query
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'Bugs',
                'code' => 500,
                'message' => 'Internal Server Error. An unexpected error occurred.',
                'details' => $th->getMessage()
            ]);
        }
    }

    public function dataJson()
    {
        $query = Pegawai::query();
        return response()->json([
            'status' => 'Ok',
            'code' => 200,
            'message' => 'Data fetch successfully.',
            'data' => $query->get()
        ]);
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $query = Pegawai::find($request->key);
            $query->delete();
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => "Deleted is successfully.",
                'data' => []
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'Bugs',
                'code' => 500,
                'message' => 'Internal Server Error. An unexpected error occurred.',
                'details' => $th->getMessage()
            ], 500);
        }
    }

    public function updated(Request $request)
    {
        DB::beginTransaction();
        try {
            $query = Pegawai::find($request->id);
            $query->update([
                'no_identitas' => $request->no_identitas,
                'pegawai_name' => $request->nama,
                'gender' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'telpon' => $request->telpon,
                'email' => $request->email,
                'file_photo' => ''
            ]);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => "Updated is successfully.",
                'data' => []
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'Bugs',
                'code' => 500,
                'message' => 'Internal Server Error. An unexpected error occurred.',
                'details' => $th->getMessage()
            ], 500);
        }
    }
}
