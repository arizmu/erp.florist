<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard() {
        // return view('Pages.Dashboard');
        return to_route('kasir.index');
    }
}
