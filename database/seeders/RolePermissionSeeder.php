<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $role =  Role::create([
            'name' => 'superadmin',
            'role_title' => 'Super Admin',
            'guard_name' => 'web',
        ]);

        // code for get all permisson 
        $permissions = Permission::all();

        // code for assign permission to role
        $role->syncPermissions($permissions);

    }
}
