<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;

class CountryStateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        City::truncate();       
        State::truncate();
        Country::truncate();

        //Paises
        Country::create(['id'=>1058,'name'=>'Brasil', 'initials'=>'BRA', 'ibge_code'=>1058]);

        //Estados
        $response = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
        if($response->successful()) {
            $estados = $response->json();
            foreach ($estados as $estado) {
                State::create([
                    'id'         =>$estado['id'],
                    'name'       => $estado['nome'],
                    'initials'   => $estado['sigla'],
                    'ibge_code'  => $estado['id'],
                    'country_id' => 1058
                ]);

                $responseCidade = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/'.$estado['id'].'/municipios');
                if($responseCidade->successful()){
                    $cidades = $responseCidade->json();
                    foreach ($cidades as $cidade) {
                        City::create([
                            'id'       => $cidade['id'],
                            'name'     => $cidade['nome'],
                            'state_id' => $estado['id'],
                            'ibge_code'=> $cidade['id']
                        ]);
                    }
                }

            }
        }
        Schema::enableForeignKeyConstraints();
    }
}
