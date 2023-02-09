<?php

namespace App\Http\Controllers;

use App\Models\ciudades;
use App\Models\departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ciudadController extends Controller
{
    //
    public function buscar($id)
    {
        $ciudades = DB::select('select * from ciudades where departamento_id ='. $id);
        return $ciudades;
    }

    public function buscarCiudad($id){
        $ciudad = ciudades::find($id);
        $departamento = departamento::find($ciudad->departamento_id);
        return [$ciudad,$departamento];
    }

    public function buscarTodo($id)
    {
        $consulta = DB::select('select departamentos.nombre as "nombreDepar",departamentos.id as "idDepar",ciudades.id as "idCiudad", ciudades.nombre as "NombreCiudad" from departamentos inner join ciudades on departamentos.id = ciudades.departamento_id where  ciudades.id ='.$id);

        return $consulta;

    }
    
}
