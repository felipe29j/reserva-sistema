<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'hotel_id' => null,
            'role' => 'master',
            'name' => 'Admin Master',
            'login' => 'admin',
            'status' => 'active',
            'password' => Hash::make('1234'),
        ]);

        User::create([
            'hotel_id' => 1, // Assumindo que um hotel com ID 1 já existe
            'role' => 'admin',
            'name' => 'Admin Hotel',
            'login' => 'adminhotel',
            'status' => 'active',
            'password' => Hash::make('1234'),
        ]);
    }
}
