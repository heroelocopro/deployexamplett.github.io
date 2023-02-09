@extends('layouts.panel')
@section('titulo','Lugares')
@section('content')
<div class="container-fluid pb-4 overflow-hidden">
    <div class="card bg-transparent bg-white mt-5 shadow">
      <div class="card-header ">
        <a href="{{ route('eventos-gestion') }}" class="btn btn-github">Volver</a>
        <h1 class="text-center"><i class="far fa-calendar-alt text-blue"></i>Actualizacion de Eventos <i class="far fa-calendar-alt text-blue"></i></h1>
      </div>
      <div class="card-body">
        <p class="text-dark font-weight-700">En este apartado se Actualizan los Eventos. solo se actualiza lo que modifiques.
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
          <form method="POST" id="formularioActualizacionEventos" enctype="multipart/form-data" action="{{ route('eventos-actualizar-post') }}">
            @csrf
            {{-- evento --}}
            <div class="form-group">
                <div class="input-group input-group-alternative mb-3 border">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-pin-3 text-orange"></i> </span>
                  </div>
                  <select class="form-control" name="evento_id" id="evento_id">
                    <option value="">Selecciona un Evento para actualizarlo</option>
                    @foreach ($eventos as $evento )
                        <option value="{{ $evento->id }}">{{ $evento->nombre }}</option>
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
                            {{-- imagen nueva --}}
                            <div class="form-group">
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="text-dark		fas fa-box">Imagen Nueva</i></span>
                                </div>
                                <input accept="image/png, image/gif, image/jpeg" class="form-control" type="file" name="imagen" id="">
                              </div>
                            </div>

                 {{-- fechas --}}
                 <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3 border">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="text-pink	far fa-sticky-note">Fecha inicio</i></span>
                              </div>
                              <input id="fechaInicio" class="form-control font-weight-900 text-dark " placeholder="fechaInicio" type="date" name="fechaInicio"   autocomplete="descripcion" autofocus>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3 border">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="text-pink	far fa-sticky-note">Fecha fin</i></span>
                              </div>
                              <input id="fechaFin" class="form-control font-weight-900 text-dark " placeholder="fechaFin" type="date" name="fechaFin"   autocomplete="descripcion" autofocus>
                            </div>
                          </div>
                    </div>
                 </div>

                 <div>
                    <hr>
                 </div>
                 {{-- departamentos y ciudades actuales  --}}

                 <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3 border">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="text-pink	far fa-sticky-note">Departamento Actual</i></span>
                              </div>
                              <input class="form-control text-center" id="departamentoActual" disabled type="text">
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3 border">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="text-pink	far fa-sticky-note">Ciudad Actual</i></span>
                              </div>
                              <input class="form-control" id="ciudadActual" disabled type="text">
                            </div>
                          </div>
                    </div>
                 </div>
                 <div>
                    <hr>
                 </div>
                 {{-- departamentos y ciudades PARA CAMBIAR --}}
                 <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3 border">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="text-pink	far fa-sticky-note"></i></span>
                              </div>
                              <select class="form-control text-dark" name="departamento_id" id="departamento_id">
                                <option value="">Selecciona un departamento si lo deseas actualizar</option>
                                @foreach ($departamentos as $departamento )
                                    <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3 border">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="text-pink	far fa-sticky-note"></i></span>
                              </div>
                              <select class="form-control text-dark" name="ciudad_id" id="ciudad_id">

                              </select>
                            </div>
                          </div>
                    </div>
                 </div>

                 <div>
                    <hr>
                 </div>

                 {{-- lugar actual --}}
                 <div class="form-group">
                    <div class="input-group input-group-alternative mb-3 border">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="text-pink	far fa-sticky-note">Lugar Actual</i></span>
                      </div>
                      <input class="form-control" id="lugarActual" value="" disabled type="text">
                    </div>
                  </div>


                  {{-- lugar Actualizar --}}
                 <div class="form-group">
                    <div class="input-group input-group-alternative mb-3 border">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="text-pink	far fa-sticky-note"></i></span>
                      </div>
                      <select class="form-control" name="lugarUpdate" id="">
                        <option value="">Selecciona un lugar para actualizarlo</option>
                        @foreach ($lugares as $lugar )
                             <option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
              <button type="submit" class="btn btn-github mx-auto d-block ">Actualizar</button>
          </form>
        </div>
      </div>
  </div>
@endsection