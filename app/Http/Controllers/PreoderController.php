<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreoderController extends Controller
{
    public function formLayout() {
        return view('Pages.penjualan.pre-order.pre-order-form');
    }

    public function getMaterial() {
        
    }
}
