<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Hotel;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Cria um hotel com ID 1
        $hotel1 = Hotel::create([
            'name' => 'Hotel Exemplo',
            'url' => 'http://exemplo.com',
            'cnpj' => '00.000.000/0001-00',
            'status' => 'ativo',
        ]);

        // Cria um hotel com ID 2
        $hotel2 = Hotel::create([
            'name' => 'Outro Hotel Exemplo',
            'url' => 'http://outroexemplo.com',
            'cnpj' => '11.111.111/0001-11',
            'status' => 'ativo',
        ]);

        // Cria um usuário com referência ao hotel1
        User::create([
            'hotel_id' => $hotel1->id, // Usa o ID do hotel criado
            'role' => 'admin',
            'name' => 'Admin Hotel',
            'login' => 'adminhotel',
            'status' => 'active',
            'password' => Hash::make('1234'),
        ]);

        // Cria um usuário com referência ao hotel2
        User::create([
            'hotel_id' => $hotel2->id, // Usa o ID do hotel criado
            'role' => 'master',
            'name' => 'Admin Master',
            'login' => 'admin',
            'status' => 'active',
            'password' => Hash::make('1234'),
        ]);
    }
}

