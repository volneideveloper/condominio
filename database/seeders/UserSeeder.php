<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin2025'),
            'telefone' => '11999999999',
            'is_active' => true,
            'system_status_id' => 1,
            'profile_image' => 'images/users/EuXRJssoqLoy7cUjwQ1Vm46Y47hoKxyrsSsuKwSj.jpg', // ← caminho relativo
        ]);

        // Exemplo de mais usuários sem imagem
        User::factory(5)->create();
    }
}
