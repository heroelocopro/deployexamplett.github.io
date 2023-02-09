@extends('layouts.panel')

@section('titulo','Perfil')

@section('content')
    <div class="container-fluid pb-4 overflow-hidden">
      <div class="card bg-transparent bg-white mt-5 shadow-lg">
        <div class="card-header ">
          <span class="text-dark font-weight-700">Datos del usuario</span>
          <button id="btnEditar" class="btn btn-slack float-right mb-3">Editar</button>
        </div>
        <div class="card-body my-3">
          <form enctype="multipart/form-data" method="POST" action="{{ route('usuario-actualizar') }}">
            @csrf
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="name" class="text-center font-weight-700 text-dark">Nombre</label>
                  <input class="form-control font-weight-400 text-dark " disabled type="text" name="name" id="input-name" placeholder="nombre de perfil" value="{{ auth()->user()->name }}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="name" class="text-center font-weight-700 text-dark">Correo Electronico</label>
                  <input class="form-control font-weight-400 text-dark " disabled type="text" name="email" id="input-email" placeholder="Correo electronico" value="{{ auth()->user()->email }}">
                </div>
              </div>

              <div class="col-lg-12 text-center">
                <label for="input-perfil" class="text-center  font-weight-700 text-dark ">Foto de Perfil</label><br>
                <img style="height: 20rem;width:20rem;" class="  img-fluid rounded-circle" src="{{ asset('img/perfil/'.auth()->user()->perfil) }}" alt="" srcset=""><br>
                <input accept="image/png, image/gif, image/jpeg" disabled  name="perfil" id="input-perfil" type="file">
              </div>
            </div>
            <button type="submit" id="btnActualizar" class="btn btn-success  mx-auto mt-5 d-none ">Actualizar</button>
          </form>
        </div>
      </div>
    </div>
@endsection