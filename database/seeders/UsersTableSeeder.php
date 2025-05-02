<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'hello',
            'email' => 'hello@superadmin.com',
            'password' => Hash::make('hellosecret'),
        ]);

        $user->assignRole('superadmin');
    }
}
