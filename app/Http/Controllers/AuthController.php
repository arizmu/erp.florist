<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormLoginRequst;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller
{
    public function LoginFrom()
    {
        return view('login');
    }

    public function LoginAction(FormLoginRequst $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt([
            'name' => $credentials['username'],
            'password' => $credentials['password']
        ]) || Auth::attempt([
            'email' => $credentials['username'],
            'password' => $credentials['password']
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function LogoutAction(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function me() {
        $user = Auth::user();
        $pegawai = Pegawai::select('pegawai_name', 'telpon')->find($user->pegawai_id);
        
        
        $data = [
            'name' => $pegawai->pegawai_name,
            'telpon' => $pegawai->telpon,
            'alamat' => '',
            'username' => $user->name,
            'email' => $user->email
        ];
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Data berhasil diambil',
            'data' => $data
        ]);
    }
}
