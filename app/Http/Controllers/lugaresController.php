<?php

namespace App\Http\Controllers;

use App\Models\lugares;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class lugaresController extends Controller
{
    public function vistaPrincipal()
    {
        $lugares = lugares::paginate(1);
        return view('lugares.index',compact(['lugares']));
    }
    public function vistaGestion()
    {
        return view('lugares.gestionar');
    }
    public function vistaCrear()
    {
        return view('lugares.create');
    }
    public function vistaActualizar(){
        $lugares = lugares::all();
        return view('lugares.update',compact(['lugares']));
    }
    public function vistaEliminar()
    {
        $lugares = lugares::all();
        return view('lugares.delete',compact(['lugares']));
    }
    public function creacion(Request $request)
    {
        // verificacion de datos
        $datos = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image',
            'ubicacion' => 'required'
        ]);
        // iniciamos la clase
        $lugar = new lugares();
        // verificamos la imagen y movemos a la carpeta
        if($request->hasFile('imagen'))
        {
            $destination_path = 'public/images/lugares';
            $image = $request->imagen;
            $image_name = $image->getClientOriginalName();
            $path = $request->file('imagen')->storeAs($destination_path,$image_name);

            $lugar->imagen = $image_name;
        };

        // asignamos los valores 1x1
        $lugar->nombre = $request->nombre;
        $lugar->descripcion = $request->descripcion;
        $lugar->ubicacion = $request->ubicacion;

        // guardamos
        $lugar->save();
        Alert::success('Lugar ' .$lugar->nombre,' fue creado con exito');
        return redirect()->back();

        
    }
    public function buscar($id)
    {
        $lugar = lugares::find($id);
        if(strlen($lugar) <= 0)
        {
            Alert::error('404','No existe ');
            return view('home');
        }
        else{
            return view('lugares.show',compact(['lugar']));
        }
        
    }
    public function leer()
    {
        $lugares = lugares::paginate(10);
        return view('lugares.read',compact(['lugares']));
    }
    public function lugaresActualizarBuscar($id)
    {
        $lugar = lugares::find($id);
        return $lugar;
    }

    public function actualizar(Request $request)
    {
        $request->validate([
            'lugar_id' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'ubicacion' => 'required',
        ]);

        $lugar = lugares::find($request->lugar_id);
        $lugar->nombre = $request->nombre;
        $lugar->descripcion = $request->descripcion;

        if($request->hasFile('imagen'))
        {
            $destination_path = 'public/images/lugares';
            $image = $request->imagen;
            $image_name = $image->getClientOriginalName();
            $path = $request->file('imagen')->storeAs($destination_path,$image_name);

            $lugar->imagen = $image_name;
        };
        
        $lugar->ubicacion = $request->ubicacion;
        $lugar->save();
        Alert::success("Lugar Actualizado",'OK');
        return redirect()->back();
    }

    public function eliminar(Request $request)
    {
        try {
            $request->validate([
                'lugar_id' => 'required'
            ]);
            $lugar = lugares::find($request->lugar_id);
            $lugar->delete();
            Alert::success("Lugar Eliminado con exito","");
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('un error ha ocurrido', $th->getMessage());
            return back();
        }

    }

    public function buscarTodo($id){
        $lugar = lugares::find($id);
        return $lugar;
    }
}
