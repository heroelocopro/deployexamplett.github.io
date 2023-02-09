<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ciudades;
use App\Models\departamento;
use App\Models\roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // creamos los roles
        roles::create(['rol' => 'usuario']);
        roles::create(['rol' => 'admin']);
        // creamos los departamentos y ciudades

        $response = Http::get('https://raw.githubusercontent.com/marcovega/colombia-json/master/colombia.min.json');
        $json = $response->json();
        $departamentos = array();
        $ciudades = array();
        for($i = 0; $i < 31; $i++)
        {
            if($i == 0)
            {
                $departamentos[$i] = $json[$i];
                $depar = departamento::create([
                    
                    'id' => $i+1,
                    'nombre' => $departamentos[$i]['departamento']
                ]);
                $tamaño = count($departamentos[$i]['ciudades']);
                for($j = 0; $j < $tamaño;$j++)
                {
                    $ciu = ciudades::create([
                        'nombre' => $departamentos[$i]['ciudades'][$j],
                        'departamento_id' => $departamentos[$i]['id']+1
                    ]);
                }
            }
            else
            {
                $departamentos[$i] = $json[$i];
                $ciudades['departamento_id'] = $i+1;
                $depar = departamento::create([
                    'id' => $i+1,
                    'nombre' => $departamentos[$i]['departamento']
                ]);
                $tamaño = count($departamentos[$i]['ciudades']);
                for($j = 0; $j < $tamaño;$j++)
                {
                    $ciu = ciudades::create([
                        'nombre' => $departamentos[$i]['ciudades'][$j],
                        'departamento_id' => $departamentos[$i]['id']+1
                    ]);
                }
            }

        }


    }
}
