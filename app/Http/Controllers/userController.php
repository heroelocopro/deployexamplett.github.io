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
            $destination_path = 'public/images/users';
            $image = $request->perfil;
            $image_name = $image->getClientOriginalName();
            $path = $request->file('perfil')->storeAs($destination_path,$image_name);

            $usuario->perfil = $image_name;
        };

        $usuario->save();
        Alert::success("Datos del usuario actualizado con exito",'OK');
        return redirect()->back();
        
    }
}
