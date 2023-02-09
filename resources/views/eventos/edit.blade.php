@extends('layouts.panel')

    @section('titulo','Gestionar Eventos!')
@section('content')
<div class="container mt--8 pb-5">
    <div class="card bg-secondary shadow">
        <div class="card-header">
            <h1 class="text-center">Control total de eventos</h1>
        </div>
        <div class="card-body">
            <p class="text-center">En este apartado encontraras las diferentes opciones para gestionar los eventos</p>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                {{-- botones --}}
                <div class="col-lg-3">
                    <button class="btn btn-success mx-auto d-block">Crear <i class="	fas fa-gavel"></i> </button>
                </div>
                <div class="col-lg-3">
                    <button class="btn btn-primary mx-auto d-block">Leer <i class="	fas fa-eye"></i> </button>
                </div>
                <div class="col-lg-3">
                    <button class="btn btn-dark mx-auto d-block ">Actualizar <i class="	fas fa-pencil-alt"></i></button>
                </div>
                <div class="col-lg-3">
                    <button class="btn btn-danger mx-auto d-block">Eliminar <i class="	fas fa-trash-alt"></i></button>
                </div>
            </div>
            <div class="row mt-3">

                {{-- informacion --}}
                <div class="col-lg-3">
                    <p class="text-success font-weight-700 text-center"> El boton crear te redirige a un formulario donde debes diligenciar los datos solicitados.</p>
                </div>
                <div class="col-lg-3">
                    <p class="text-primary font-weight-700 text-center"> El boton Leer te redirige a una tabla con todos los eventos para visualizarlos en cantidad</p>
                </div>
                <div class="col-lg-3">
                    <p class="text-dark font-weight-700 text-center"> El boton Actualizar te Modificar la informacion de el evento seleccionado a traves de un formulario</p>
                </div>
                <div class="col-lg-3">
                    <p class="text-danger font-weight-700 text-center"> El boton eliminar te permite destruir el evento seleccionado.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Table -->
    {{-- <div class="row justify-content-center mt-5">
      <div class="col-lg-12 col-md-8">
        <div class="card bg-secondary shadow border-1">
          <div class="card-body px-lg-5 py-lg-5">
            @if ($errors->any())
                <div class="text-center text-muted mb-2">
                    <small>Se encontro el siguiente error</small>
                  </div>
                <div class="alert alert-danger mb-4" role="alert">
                     {{$errors->first()}}
                </div>
                
                @else
                <div class="text-center text-muted mb-4">
                    <small>Ingresa tus datos</small>
                  </div>
                @endif
            <form role="form" method="POST" action="{{ route('register') }}">
                @csrf
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                  </div>
                  <input class="form-control" placeholder="Nombre" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Correo Electronico" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="Contraseña" type="password" name="password" required autocomplete="new-password">
                </div>
              </div>

              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="Repetir Contraseña" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
              </div>

              
              <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">Registrarse</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> --}}

    {{-- prototipo --}}
    {{-- <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre del Evento</th>
                    <th scope="col">Lugar del Evento</th>
                    <th scope="col">Gestionarlo</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td><a href="" class="fs-1"><i class=" fas fa-edit"></i></a></td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div> --}}
  </div>
@endsection
