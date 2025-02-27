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

    public function jsonData(Request $request)
    {
        $query = Costumer::query()->when(request()->key, function ($iResult) {
            $key = request()->key;
            $iResult->where('name', 'like', '%' . $key . '%')
                ->orWhere('alamat', 'like', '%' . $key . '%')
                ->orWhere('no_telp', 'like', '%' . $key . '%');
        })->paginate(15);
        return getResponseJson('ok', 200, 'cosutemr fetch successfully', $query, false);
    }

    public function hapus() {
        $id = request()->id;
        Costumer::where('id', $id)->delete();
        return getResponseJson('ok', 200, 'Costumer deleted successfully', null, null);
    }

    public function update(Request $request) {
        $id = request()->id;
        $costumer = Costumer::find($id);
        $costumer->name = $request->costumer;
        $costumer->jenis_kelamin = $request->gender;
        $costumer->alamat = $request->address;
        $costumer->no_telp = $request->telpon;
        $costumer->email = $request->email;
        $costumer->sosmed = $request->sosmed ? $request->sosmed : $costumer->sosmed;
        $costumer->save();
        return getResponseJson('ok', 200, 'Costumer updated successfully', null, null);
    }

}
