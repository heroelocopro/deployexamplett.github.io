<?php

namespace App\Http\Controllers;

use App\Models\comentarioEvento;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class comentarioEventoController extends Controller
{
    //
    public function index(Request $request)
    {
        $request->validate([
            'evento_id' => 'required',
            'usuario_id' => 'required',
            'comentario' => 'required',
        ]);

        $comentario = new comentarioEvento();
        $comentario->comentario = $request->comentario;
        $comentario->evento_id = $request->evento_id;
        $comentario->usuario_id = $request->usuario_id;
        $comentario->fechaCreacion = now();
        $comentario->save();

        Alert::toast('comentario creado','success');
        return back();
    }
}
