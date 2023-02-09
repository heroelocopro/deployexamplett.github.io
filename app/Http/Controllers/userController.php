<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class userController extends Controller
{
    public function index($id)
    {
        $usuario = User::find($id);
        return view('usuarios.index',compact(['usuario']));
    }
    public function actualizar(Request $request)
    {
        $request->validate(['name' => 'required','email' => 'required|email']);

  
            $usuario = User::find(auth()->user()->id);
            $usuario->name = $request->name;
            $usuario->email = $request->email;

            if($request->hasFile('perfil'))
        {
            $imagen = $request->file('perfil');
            $ruta = 'img/perfil/';
            $imagenNombre = time() .'-' . $imagen->getClientOriginalName();
            $subirImagen = $request->file('perfil')->move($ruta,$imagenNombre);
            $usuario->perfil = $imagenNombre;
        };

        $usuario->save();
        Alert::success("Datos del usuario actualizado con exito",'OK');
        return redirect()->back();
        
    }
}
