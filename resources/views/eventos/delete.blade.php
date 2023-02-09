@extends('layouts.panel')
@section('titulo','Eventos')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid pb-4 overflow-hidden">
    <div class="card bg-transparent bg-white mt-5 shadow">
      <div class="card-header ">
        <a href="{{ route('eventos-gestion') }}" class="btn btn-github">Volver</a>
        <h1 class="text-center">
            <i class="far fa-calendar-alt text-blue"></i> 
            Eliminacion de Eventos 
            <i class="far fa-calendar-alt text-blue"></i> 
        </h1>
      </div>
      <div class="card-body">
        <p>En este apartado se Eliminan los Eventos.
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
          <form method="POST" id="formularioActualizacionLugares" enctype="multipart/form-data" action="{{ route('eventos-eliminar-post') }}">
            @csrf
            {{-- Lugares --}}
            <div class="form-group">
                <div class="input-group input-group-alternative mb-3 border">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-pin-3 text-orange"></i> </span>
                  </div>
                  <select class="form-control "  name="evento_id" id="evento">
                    <option value="">Selecciona un lugar para Eliminarlo</option>
                    @foreach ($eventos as $evento )
                        <option value="{{ $evento->id }}">{{ $evento->nombre }}</option>
                    @endforeach
                </select>
                </div>
              </div>

              <button id="eliminarEvento" type="button"  class="btn btn-danger mx-auto d-block mb-2 ">Eliminar</button>
              <button id="eliminarEvento2" type="submit" class="btn btn-danger mx-auto d-none">Eliminar </button>
            </form>
        </div>
      </div>
  </div>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/eventos-delete.js"></script>
@endsection