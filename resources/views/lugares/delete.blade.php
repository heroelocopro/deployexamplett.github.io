@extends('layouts.panel')
@section('titulo','Lugares')
@section('content')
<div class="container-fluid pb-4 overflow-hidden">
    <div class="card bg-transparent bg-white mt-5 shadow">
      <div class="card-header ">
        <a href="{{ route('lugares-gestion') }}" class="btn btn-github">Volver</a>
        <h1 class="text-center"><i class="ni ni-pin-3 text-orange"></i>Eliminacion de Lugares <i class="ni ni-pin-3 text-orange"></i></h1>
      </div>
      <div class="card-body">
        <p>En este apartado se Eliminan los Lugares.
        </p>
     <div class="row">
       
     </div>
      </div>
    </div>
    <div class="card bg-transparent bg-white mt-5 shadow">
        <div class="card-header ">
          <h1 class="text-center"> <i class="text-danger		fas fa-trash"></i> Formulario de Eliminacion <i class="text-danger		fas fa-trash"></i></h1>
        </div>
        <div class="card-body">
          <form method="POST" id="formularioActualizacionLugares" enctype="multipart/form-data" action="{{ route('lugares-eliminar-post') }}">
            @csrf
            {{-- Lugares --}}
            <div class="form-group">
                <div class="input-group input-group-alternative mb-3 border">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-pin-3 text-orange"></i> </span>
                  </div>
                  <select class="form-control" name="lugar_id" id="lugar">
                    <option value="">Selecciona un lugar para Eliminarlo</option>
                    @foreach ($lugares as $lugar )
                        <option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
                    @endforeach
                </select>
                </div>
              </div>


                
            <button id="lugarEliminar" type="button" class="btn btn-danger mx-auto d-block mb-2 ">Eliminar</button>
            <button id="lugarEliminar2" type="submit" class="btn btn-danger d-none mx-auto  mb-2 ">Eliminar</button>
          </form>
        </div>
      </div>
  </div>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection