<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
           'name'=>'Manager',
           'role_id'=>1,
           'email'=>'manager@company.com',
           'password'=>Hash::make('admin123')
        ]);
        User::create([
           'name'=>'Client',
           'role_id'=>2,
           'email'=>'client@company.com',
           'password'=>Hash::make('admin123')
        ]);
    }
}
