<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
        public function index()
        {
            return view('Pages.Products.satuan-index');
        }
}
