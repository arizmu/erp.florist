<?php

namespace App\Http\Controllers;

use App\Models\Production\Production;
use Illuminate\Http\Request;

class CraftingController extends Controller
{
    public function index() {
        return view('Pages.Jasalayanan.jasa-index');
    }

    public function dataJson() {
        $query = Production::query()->with('pegawai');
        return getResponseJson("ok", 200, "data fetch", $query->get(), false);
    }
}
