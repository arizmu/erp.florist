<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RolesPermissionController extends Controller
{
    public function index()
    {
        return view('Pages.role-permission.role-permission');
    }

    public function store(Request $request) {
        return $request;
    }

    public function json() {
        return response()->json([
            'data' => 'data'
        ]);
    }

    public function update(Request $request) {
        return $request;
    }

    public function destroy(Request $request) {
        return $request;
    }

    public function permissionJson(Request $request) {
        $query = Permission::select('id', 'name', 'permission_title')
        ->when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('permission_title', 'like', '%' . $request->search . '%');
        })->get();
        return response()->json([
            'status' => 'ok',
            'message' => 'Data fetch successfully',
            'data' => $query
        ]);
    }
}
