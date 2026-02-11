<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RolesPermissionController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'role_or_permission:role-management'
        ];
    }

    public function index()
    {
        return view('Pages.role-permission.role-permission');
    }

    public function store(Request $request)
    {
        $dataValidasi = Validator::make($request->all(), [
            'role_name' => 'required|string|max:255',
            'permissions' => 'required|array',
        ], [
            'role_name.required' => 'Role name is required',
            'permissions.required' => 'Permissions is required'
        ]);

        if ($dataValidasi->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $dataValidasi->errors()->first(),
            ], 422);
        }

        $role = Role::create([
            'name' => $request->role_name,
            'guard_name' => 'web'
        ]);
        $permission = [];
        foreach ($request->permissions as $key => $value) {
            $permission[] = $key;
        }
        $role->syncPermissions($permission);
        return response()->json([
            'status' => 'ok',
            'message' => 'Role created successfully',
            'data' => $role
        ]);
    }

    public function json()
    {
        $roles = Role::select('id', 'name', 'guard_name')
            ->paginate(10)
            ->map(function ($role) {
                return [
                    'id' => $role->id,
                    'name' => $role->name,
                    'guard_name' => $role->guard_name,
                    // 'permissions' => $role->permissions->pluck('permission_title')->toArray(),
                    'permissions' => $role->permissions,
                ];
            });
        return response()->json([
            'status' => 'ok',
            'message' => 'Data fetch successfully',
            'data' => $roles
        ]);
    }

    public function update(Request $request)
    {
        validator::make($request->all(), [
            'role_name' => 'required|string|max:255',
            'permissions' => 'required|array',
        ], [
            'role_name.required' => 'Role name is required',
            'permissions.required' => 'Permissions is required'
        ])->validate();

        $role = Role::find($request->id);
        $role->update([
            'name' => $request->role_name,
            'guard_name' => 'web'
        ]);
        $permission = [];
        foreach ($request->permissions as $key => $value) {
            $permission[] = $key;
        }
        $role->syncPermissions($permission);
        return response()->json([
            'status' => 'ok',
            'message' => 'Role updated successfully',
            'data' => $role
        ]);
    }

    public function destroy(Request $request)
    {
        $role = Role::find($request->id);
        $role->delete();
        return response()->json([
            'status' => 'ok',
            'message' => 'Role deleted successfully',
            'data' => $role
        ]);
    }

    public function permissionJson(Request $request)
    {
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
