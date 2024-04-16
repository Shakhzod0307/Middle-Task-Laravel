<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

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
    }
}
