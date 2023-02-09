<?php

namespace App\Http\Controllers;

use App\Models\lugares_eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LugarEventoController extends Controller
{
    //
    public function buscar($id)
    {
        $lugarEvento = DB::select("SELECT lugares.nombre as nombreLugar, eventos.nombre as nombreEvento FROM lugares_eventos inner join lugares on lugares_eventos.lugares_id = lugares.id inner join eventos on lugares_eventos.eventos_id = eventos.id where lugares_eventos.eventos_id = ".$id);
        return $lugarEvento;
    }
}
