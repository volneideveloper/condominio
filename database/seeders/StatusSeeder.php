<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('system_status')->insert([
            ['id' => 1, 'name' => 'Ativo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Inativo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Pendente', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Pago', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Processando', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Aguarde', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
