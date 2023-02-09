@extends('layouts.panel')
@section('titulo','Lugares')
@section('content')
<div class="container-fluid pb-4 overflow-hidden ">
    <div class="card bg-transparent bg-light mt-5 shadow">
      <div class="card-header ">
        <a href="{{ route('lugares-gestion') }}" class="btn btn-success">Volver</a>
        <h1 class="text-center">Creacion de Lugares</h1>
      </div>
      <div class="card-body">
        <p>En este apartado se crean los Lugares siguiendo los proximos requisitos:
            <ol>
                <li>Es necesario un <span class="text-danger font-weight-600">Nombre.</span></li>
                <li>Es necesario una <span class="text-danger font-weight-600">Descripción.</span></li>
                <li>Es necesario una <span class="text-danger font-weight-600">Imagen.</span></li>
                <li>Es necesario una <span class="text-danger font-weight-600">ubicación. </span></li>
            </ol>
        </p>
     <div class="row">
       
     </div>
      </div>
    </div>
    <div class="card bg-transparent bg-white mt-5 border  border-dark shadow">
        <div class="card-header ">
          <h1 class="text-center"> <i class="text-success	fas fa-plus"></i> Formulario Creacion <i class="text-success	fas fa-plus"></i></h1>
        </div>
        <div class="card-body">
          <form method="POST" id="formularioCreacionEventos" enctype="multipart/form-data" action="{{ route('lugares-crear-post') }}">
            @csrf
            {{-- nombre --}}
            <div class="form-group">
                <div class="input-group input-group-alternative mb-3 border">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class=" text-blue	fas fa-map"></i></span>
                  </div>
                  <input class="form-control font-weight-900 text-dark" placeholder="Nombre" type="text" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                </div>
              </div>
              {{-- Descripcion --}}
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3 border">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="text-pink	far fa-sticky-note"></i></span>
                  </div>
                  <input class="form-control font-weight-900 text-dark " placeholder="Descripcion" type="text" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus>
                </div>
              </div>
              {{-- imagen --}}
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="text-dark		fas fa-box"></i></span>
                  </div>
                  <input class="form-control font-weight-900 text-dark " placeholder="Imagen" type="file" accept="image/png, image/gif, image/jpeg" name="imagen" value="{{ old('imagen') }}" required autocomplete="descripcion" autofocus>
                </div>
              </div>
              {{-- fechas --}}
             <div class="form-group">
                  <div class="input-group input-group-alternative mb-3 border">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="		text-success	far fa-calendar-plus"></i> </span>
                    </div>
                    {{-- ubicacion --}}
                    <input class="form-control     font-weight-900 text-dark " placeholder="Ubicacion del mapa SRC google maps" type="text" name="ubicacion" value="{{ old('ubicacion') }}" required autocomplete="imagen" autofocus>
                  </div>
                
                

                
              </div>
              <button type="submit" class="btn btn-success mx-auto d-block ">Crear</button>
          </form>
        </div>
      </div>
  </div>
@endsection