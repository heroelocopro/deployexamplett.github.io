@extends('layouts.panel')
@section('titulo','Eventos')
@section('content')
<div class="container-fluid pb-4 overflow-hidden">
    <div class="card bg-transparent bg-white mt-5 shadow shadow border border-dark">
      <div class="card-header ">
        <a href="{{ route('eventos-gestion') }}" class="btn btn-warning">Volver</a>
        <h1 class="text-center">Creacion de Eventos</h1>
      </div>
      <div class="card-body">
        <p>En este apartado se crean los eventos siguiendo los proximos requisitos:
            <ol>
                <li>Es necesario un <span class="text-danger font-weight-600">Nombre.</span></li>
                <li>Es necesario un <span class="text-danger font-weight-600">Descripcion.</span></li>
                <li>Es necesario un <span class="text-danger font-weight-600">Imagen.</span></li>
                <li>Es necesario un <span class="text-danger font-weight-600">Fecha de inicio y de fin.</span></li>
                <li>Es necesario un <span class="text-danger font-weight-600">Departamento y Ciudad donde ocurre el evento.</span></li>
                <li>No es necesario crear un <span class="text-danger font-weight-600">Lugar</span> donde ocurre el evento.</li>
            </ol>
        </p>
     <div class="row">
       
     </div>
      </div>
    </div>
    <div class="card bg-transparent bg-white mt-5 shadow border border-dark">
        <div class="card-header ">
          <h1 class="text-center"> <i class="text-success	fas fa-plus"></i> Formulario Creacion <i class="text-success	fas fa-plus"></i></h1>
        </div>
        <div class="card-body">
          <form id="formularioCreacionEventos" enctype="multipart/form-data" method="POST" action="{{ route('eventos-crear-post') }}">
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
              <div class="row">
                <div class="col-lg-6">              <div class="form-group">
                  <div class="input-group input-group-alternative mb-3 border">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="		text-success	far fa-calendar-plus"></i> Fecha Inicial</span>
                    </div>
                    {{-- inicio --}}
                    <input class="form-control     font-weight-900 text-dark " placeholder="fechaInicio" type="date" name="fechaInicio" value="{{ old('fechaInicio') }}" required autocomplete="imagen" autofocus>
                  </div>
                </div></div>
                <div class="col-lg-6">              <div class="form-group">
                  <div class="input-group input-group-alternative mb-3 border">
                    {{-- fin --}}
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="	text-danger	far fa-calendar-times"></i>Fecha Final</span>
                    </div>
                    <input class="form-control font-weight-900 text-dark " placeholder="fechaFin" type="date" name="fechaFin" value="{{ old('fechaFin') }}" required autocomplete="fechaInicio" autofocus>
                  </div>
                </div></div>
              </div>

              {{-- departamento y ciudad --}}
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-6"><div class="input-group input-group-alternative mb-3 border">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="		fas fa-box"></i></span>
                    </div>
                    <select class="form-control " name="departamento" id="departamento" >
                      <option value="">Selecciona un departamento </option>
                      @foreach ($departamentos as $departamento )
                        <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                      @endforeach
                    </select>
                  </div></div>
                  <div class="col-lg-6"><div class="input-group input-group-alternative mb-3 border">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="		fas fa-box"></i></span>
                    </div>
                    <select   class="form-control" name="ciudad" id="ciudad" >
                      <option value="">departamento primero</option>
                    </select>
                  </div></div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="text-dark		fas fa-box"></i></span>
                    </div>
                    <select  class="form-control" name="lugar" id="lugar">
                      <option value="">Selecciona el lugar donde se realiza el evento</option>
                      @foreach ($lugares as $lugar )
                        <option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
              </div>
              <button type="submit" class="btn btn-success mx-auto ">Crear</button>
          </form>

        </div>
      </div>
  </div>


@endsection