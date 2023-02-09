@extends('layouts.panel')
@section('titulo','Lugares')
@section('content')
<div class="container-fluid pb-4 overflow-hidden">
    <div class="card bg-transparent bg-white mt-5 shadow">
      <div class="card-header ">
        <a href="{{ route('lugares-gestion') }}" class="btn btn-github">Volver</a>
        <h1 class="text-center"><i class="ni ni-pin-3 text-orange"></i>Actualizacion de Lugares <i class="ni ni-pin-3 text-orange"></i></h1>
      </div>
      <div class="card-body">
        <p>En este apartado se Actualizan los Lugares. solo se actualiza lo que modifiques.
        </p>
     <div class="row">
       
     </div>
      </div>
    </div>
    <div class="card bg-transparent bg-white mt-5 shadow">
        <div class="card-header ">
          <h1 class="text-center"> <i class="text-success		fas fa-paste"></i> Formulario de Actualizacion <i class="text-success		fas fa-paste"></i></h1>
        </div>
        <div class="card-body">
          <form method="POST" id="formularioActualizacionLugares" enctype="multipart/form-data" action="{{ route('lugares-actualizar-post') }}">
            @csrf
            {{-- Lugares --}}
            <div class="form-group">
                <div class="input-group input-group-alternative mb-3 border">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-pin-3 text-orange"></i> </span>
                  </div>
                  <select class="form-control" name="lugar_id" id="lugar">
                    <option value="">Selecciona un lugar para actualizarlo</option>
                    @foreach ($lugares as $lugar )
                        <option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
                    @endforeach
                </select>
                </div>
              </div>

            {{-- nombre --}}
            <div class="form-group">
                <div class="input-group input-group-alternative mb-3 border">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class=" text-blue	fas fa-map"></i></span>
                  </div>
                  <input id="nombre" class="form-control font-weight-900 text-dark" placeholder="Nombre" type="text" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                </div>
              </div>
              {{-- Descripcion --}}
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3 border">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="text-pink	far fa-sticky-note"></i></span>
                  </div>
                  <input id="descripcion" class="form-control font-weight-900 text-dark " placeholder="Descripcion" type="text" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus>
                </div>
              </div>
              {{-- imagen antigua --}}
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="text-dark		fas fa-box">Imagen Actual</i></span>
                  </div>
                  <img id="PrevisualizarImagen" class="img-fluid" src="{{ asset('img/lugares/') }}" alt="">
                </div>
              </div>
              {{-- ubicacion antigua --}}
             <div class="form-group">
                  <div class="input-group input-group-alternative mb-3 border">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="		text-success	far fa-calendar-plus">Ubicacion Actual</i> </span>
                    </div>
                    <iframe class="d-block mx-auto" id="previsualizarUbicacion" src="" frameborder="0"></iframe>
                  </div>
                  <div>
                    <hr>
                  </div>
                                {{-- imagen --}}
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="text-dark		fas fa-box">Actualizar Imagen</i></span>
                  </div>
                  <input class="form-control font-weight-900 text-dark " placeholder="Imagen" type="file" accept="image/png, image/gif, image/jpeg" name="imagen" value="{{ old('imagen') }}"  autocomplete="descripcion" autofocus>
                </div>
              </div>
              {{-- ubicacion --}}
             <div class="form-group">
                  <div class="input-group input-group-alternative mb-3 border">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="		text-success	far fa-calendar-plus">Actualizar Ubicacion</i> </span>
                    </div>
                    <input id="ubicacion" class="form-control     font-weight-900 text-dark " placeholder="Ubicacion del mapa SRC google maps" type="text" name="ubicacion" value="{{ old('ubicacion') }}" required autocomplete="imagen" autofocus>
                  </div>
                
                

                
              </div>
              <button type="submit" class="btn btn-github mx-auto d-block ">Actualizar</button>
          </form>
        </div>
      </div>
  </div>
@endsection