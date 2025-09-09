<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CondominiumSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('condominiums')->insert([
            [
                'name' => 'Condominio Padrao Teste',
                'address' => 'Rua de teste',
                'number' => '666',
                'complement' => 'Predio Teste',
                'uf' => 'RS',
                'zip_code' => '01000-000',
                'city' => 'Porto Alegre',
                'system_status_id' => 1,
                'condominium_image' => 'images/condominiums/AdOL7sqvdAWqGycZSJe7PulRehRZqzC36qsIXDAA.jpg', // ← caminho relativo
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
