<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    public function index()
    {
        return view('Pages.costumer.costumer-index');
    }

    public function jsonData()
    {
        $query = Costumer::query()->when(request()->key, function ($iResult) {
            $key = request()->key;
            $iResult->where('name', 'like', '%' . $key . '%')
                ->orWhere('alamat', 'like', '%' . $key . '%')
                ->orWhere('no_telp', 'like', '%' . $key . '%');
        })->paginate(15);
        return getResponseJson('ok', 200, 'cosutemr fetch successfully', $query, false);
    }
}
