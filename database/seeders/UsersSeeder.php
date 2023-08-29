<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama'=>'Admin',
            'email'=>'admin@gmail.com',
            'role'=> 'admin',
            'password'=>Hash::make('admin'),
        ]);

        User::create([
            'nama'=>'Outlet',
            'email'=>'outlet@gmail.com',
            'role'=> 'outlet',
            'password'=>Hash::make('outlet'),
        ]);

        User::create([
            'nama'=>'Owner',
            'email'=>'owner@gmail.com',
            'role'=> 'owner',
            'password'=>Hash::make('owner'),
        ]);
    }
}
