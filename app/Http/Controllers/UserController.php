<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('Pages.users.user-index');
    }

    public function userJson()
    {
        $query = User::all()->where('delete_status', false);
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Data berhasil diambil',
            'data' => $query
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $arrayRequest = [
                'name' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                // 'role' => $request->role
            ];
            User::create($arrayRequest);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Data berhasil ditambahkan',
                'data' => $arrayRequest
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Data gagal ditambahkan',
                'detail' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $query = User::find($id);
            $query->update([
                'active' => false,
                'delete_status' => true,
                'deleted_at' => Carbon::now()
            ]);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Data berhasil dihapus',
                'data' => $query
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Data gagal dihapus',
                'detail' => $th->getMessage()
            ], 500);
        }
    }

    public function passwordUpdate($key)
    {
        DB::beginTransaction();
        try {
            $query = User::find(request()->key);
            $query->update([
                'password' => bcrypt(request()->password)
            ]);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Data berhasil diambil',
                'data' => $query
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'perubahan password gagal',
                'detail' => $th->getMessage()
            ], 500);
        }
    }

    public function updated(Request $request)
    {
        DB::beginTransaction();
        try {
            $query = User::find($request->key);
            $query->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Data berhasil diupdate',
                'data' => $query
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

    public function getPegawai()
    {
        $query = Pegawai::query();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Data berhasil diambil',
            'data' => $query->get()
        ]);
    }
}
