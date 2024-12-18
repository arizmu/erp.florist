<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormLoginRequst;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function LoginFrom() {
        return view('login');
    }

    public function LoginAction(FormLoginRequst $request)
    {
         $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
