<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('Pages.users.user-index');
    }

    public function userJson(Request $request)
    {
        $query = User::query()->with('pegawai')->where('delete_status', false)->latest();

        $query->when($request->keywords, function ($q) use ($request) {
            $q->where(function ($subQuery) use ($request) {
                $subQuery->where('name', 'LIKE', '%' . $request->keywords . '%')
                    ->orWhere('email', 'LIKE', '%' . $request->keywords . '%');
            })->orWhereHas('pegawai', function ($pegawaiQuery) use ($request) {
                $pegawaiQuery->where('pegawai_name', 'LIKE', '%' . $request->keywords . '%');
            });
        });

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Data fetch successfully',
            'data' => $query->paginate($request->range ?? 15)
        ]);
    }

    public function store(Request $request)
    {
        $isValdiate = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'pegawai_id' => 'required'
        ]);

        if ($isValdiate->fails()) {
            return response()->json([
                'status' => 'Bad Request!',
                'message' => '',
                'errors' => $isValdiate->errors()
            ], 422);
        }
        DB::beginTransaction();
        try {
            $arrayRequest = [
                'name' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'pegawai_id' => $request->pegawai_id,
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

    public function updated(Request $request, $key)
    {
        $isValdiate = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required',
            'pegawai_id' => 'required|exists:pegawais,id',
            'password' => '',
            'confirm_password' => 'same:password',
        ]);

        if ($isValdiate->fails()) {
            return response()->json([
                'status' => 'Bad Request!',
                'message' => '',
                'errors' => $isValdiate->errors()
            ], 422);
        }
        DB::beginTransaction();
        try {
            $query = User::find($key);
            $query->update([
                'name' => $request->username,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $query->password,
                'pegawai_id' => $request->pegawai_id
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
