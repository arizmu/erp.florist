<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'app-setting',
            'permission_title' => 'App Setting',
            'guard_name' => 'web',
        ]);
        Permission::create([
            'name' => 'role-management',
            'permission_title' => 'Role Management',
            'guard_name' => 'web',
        ]);
        Permission::create([
            'name' => 'user-management',
            'permission_title' => 'User Management',
            'guard_name' => 'web',
        ]);
        Permission::create([
            'name' => 'pegwai-management',
            'permission_title' => 'Pegawai Management',
            'guard_name' => 'web',
        ]);
    }
}
