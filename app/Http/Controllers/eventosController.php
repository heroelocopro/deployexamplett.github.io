<?php

namespace App\Http\Controllers;

use App\Models\ciudades;
use App\Models\comentarioEvento;
use App\Models\departamento;
use App\Models\eventos;
use App\Models\lugares;
use App\Models\lugares_eventos;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use RealRashid\SweetAlert\Facades\Alert;

class eventosController extends Controller
{
    public function vistaPrincipal(){
        $usuarios = User::all();
        $comentarioEventos = comentarioEvento::all();
        $eventos = eventos::paginate(1);
        $departamentos = departamento::all();
        $ciudades = ciudades::all();
        return view('eventos.index',compact(['eventos','departamentos','ciudades','comentarioEventos','usuarios']));
       
    }
    public function vistaGestion()
    {
        return view('eventos.gestionar');
    }

    public function vistaCrear()
    {
        $lugares = lugares::all();
        $departamentos = departamento::all();
        return view('eventos.create',compact(['departamentos','lugares']));
    }
    public function vistaActualizar()
    {
        $eventos = eventos::all();
        $departamentos = departamento::all();
        $ciudades = ciudades::all();
        $lugares = lugares::all();
        return view('eventos.update',compact(['eventos','departamentos','ciudades','lugares']));
    }
    public function vistaEliminar()
    {
        $eventos = eventos::all();
        return view('eventos.delete',compact(['eventos']));
    }

    public function creacion(Request $request){
        $datos = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'departamento' => 'required',
            'ciudad' => 'required',
            
        ]);


        $evento = new eventos();

        if($request->hasFile('imagen'))
        {
            $imagen = $request->file('imagen');
            $ruta = 'img/eventos/';
            $imagenNombre = time() .'-' . $imagen->getClientOriginalName();
            $subirImagen = $request->file('imagen')->move($ruta,$imagenNombre);
            $evento->imagen = $imagenNombre;
        };
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;

        if($request->fechaInicio < $request->fechaFin)
        {
            $evento->fechaInicio = $request->fechaInicio;
            $evento->fechaFin = $request->fechaFin;
        }
        else{
            Alert::error('Error','La fecha de inicio es menor que la fecha final');
            return redirect()->back();
        }

        $evento->departamento_id = $request->departamento;
        $evento->ciudad_id = $request->ciudad;
        // $evento->lugar = $request->lugar;

        $evento->save();

        // creacion de lugar Evento
        $lugarEvento = new lugares_eventos();
        $lugarEvento->eventos_id = $evento->id;
        $lugarEvento->lugares_id = $request->lugar;
        $lugarEvento->save();

        Alert::success('Evento ' .$evento->nombre,' fue creado con exito');
        return redirect()->back();
    }

    public function actualizar(Request $request)
    {
        $request->validate(
            [
                'evento_id' => 'required',
                'nombre' => 'required',
                'descripcion' => 'required',
                'fechaInicio' => 'required',
                'fechaFin' => 'required',
                
            ]
        );

        $evento = eventos::find($request->evento_id);
        if($request->hasFile('imagen'))
        {
            $imagen = $request->file('imagen');
            $ruta = 'img/eventos/';
            $imagenNombre = time() .'-' . $imagen->getClientOriginalName();
            $subirImagen = $request->file('imagen')->move($ruta,$imagenNombre);
            $evento->imagen = $imagenNombre;
        };
        if($request->departamento_id != "")
        {
            $evento->departamento_id = $request->departamento_id;
            if($request->ciudad_id != "")
            {
                $evento->ciudad_id = $request->ciudad_id;
            }
        }
        if($request->lugarUpdate != "")
        {
           $lugaresEventos = lugares_eventos::where('eventos_id','=',$request->evento_id)->get();
           if($lugaresEventos != "")
           {
            $lugares = lugares::all()->first();
            $lugarEvento = new lugares_eventos();
            $lugarEvento->eventos_id = $request->evento_id;
            $lugarEvento->lugares_id = $lugares->id;
            $lugarEvento->save();
                   }
           else
           {

               $lugarEvento = lugares_eventos::find($lugaresEventos[0]['id']);
               $lugarEvento->lugares_id = $request->lugarUpdate;
               $lugarEvento->save();
            }
        }
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->fechaInicio = $request->fechaInicio;
        $evento->fechaFin = $request->fechaFin;
        $evento->save();

        Alert::success('Evento Actualizado con exito','');
        return redirect()->back();

       



    }
    // eventos que no han ocurrido
    public function filtro()
    {
        try {
        $usuarios = User::all();
        $comentarioEventos = comentarioEvento::all();
        $departamentos = departamento::all();
        $ciudades = ciudades::all();
        $eventos = eventos::fecha();
        return view('eventos.index',compact(['eventos','departamentos','ciudades','usuarios','comentarioEventos']));
        } catch (\Throwable $th) {
            Alert::Toast('No se encontraron eventos que no han ocurrido','info');
            return back();
        }
        
    }

    // eventos que estan ocurriendo
    public function filtro2()
    {
        try {
            $eventos = eventos::ocurriendo();
            $usuarios = User::all();
            $comentarioEventos = comentarioEvento::all();
            $departamentos = departamento::all();
            $ciudades = ciudades::all();
            return view('eventos.index',compact(['eventos','departamentos','ciudades','usuarios','comentarioEventos']));    
        } catch (\Throwable $th) {
            Alert::toast('no se han encontrado eventos que esten ocurriendo','info');
            return back(); 
        }
        
    }

    public function filtro3()
    {
        try {
            
            $eventos = eventos::antiguo();
            $usuarios = User::all();
            $comentarioEventos = comentarioEvento::all();
            $departamentos = departamento::all();
            $ciudades = ciudades::all();
            return view('eventos.index',compact(['eventos','departamentos','ciudades','usuarios','comentarioEventos']));
        } catch (\Throwable $th) {
            Alert::toast('no se han encontrado eventos que hayan ocurriendo','info');
            return back();
        }
    }

    public function buscar($id)
    {
        $usuarios = User::all();
            $comentarioEventos = comentarioEvento::all();
        $departamentos = departamento::all();
        $ciudades = ciudades::all();
        $evento = eventos::find($id);
        if(strlen($evento) <= 0)
        {
            Alert::error('404','No existe ');
            return view('home');
        }
        else {

            return view('eventos.show',compact(['evento','departamentos','ciudades','usuarios','comentarioEventos']));
        }
    }
    public function leer()
    {
        $eventos = eventos::paginate(10);
        $departamentos = departamento::all();
        $ciudades = ciudades::all();
        return view('eventos.read',compact(['eventos','departamentos','ciudades']));
    }

    public function eventosActualizarbuscar($id)
    {
        $evento = eventos::find($id);
        return $evento;
    }
    public function eliminar(Request $request)
    {
        try {
            $request->validate(['evento_id' => 'required']);
            $evento = eventos::find($request->evento_id);
            $evento->delete();
            Alert::success("Evento Eliminado con exito","");
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Ha ocurrido un error', $th->getMessage());
            return back();
        }

    }
}
