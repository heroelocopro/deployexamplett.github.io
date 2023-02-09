@extends('layouts.panel')

    @section('titulo','Gestionar Lugares!')
@section('content')
<div class="container mt--8 pb-5">
    <div class="card bg-secondary shadow">
        <div class="card-header">
            <h1 class="text-center">Control total de Lugares <i class="ni ni-pin-3 text-orange"></i></h1>
        </div>
        <div class="card-body">
            <p class="text-center">En este apartado encontraras las diferentes opciones para gestionar los Lugares</p>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                {{-- botones --}}
                <div class="col-lg-3 text-center">
                    <a class="btn btn-success  " href="{{ route('lugares-crear') }}">Crear <i class="	fas fa-gavel"></i> </a> 
                </div>
                <div class="col-lg-3 text-center" >
                    <a href="{{ route('lugares-leer') }}" class="btn btn-primary ">Leer <i class="	fas fa-eye"></i> </a>
                </div>
                <div class="col-lg-3 text-center">
                    <a href="{{ route('lugares-actualizar') }}" class="btn btn-dark  ">Actualizar <i class="	fas fa-pencil-alt"></i></a>
                </div>
                <div class="col-lg-3 text-center">
                    <a href="{{ route('lugares-eliminar') }}" class="btn btn-danger ">Eliminar <i class="	fas fa-trash-alt"></i></a>
                </div>
            </div>
            <div class="row mt-3">

                {{-- informacion --}}
                <div class="col-lg-3">
                    <p class="text-success font-weight-700 text-center"> El boton crear te redirige a un formulario donde debes diligenciar los datos solicitados.</p>
                </div>
                <div class="col-lg-3">
                    <p class="text-primary font-weight-700 text-center"> El boton Leer te redirige a una tabla con todos los Lugares para visualizarlos en cantidad</p>
                </div>
                <div class="col-lg-3">
                    <p class="text-dark font-weight-700 text-center"> El boton Actualizar te Modificar la informacion de el Lugar seleccionado a traves de un formulario</p>
                </div>
                <div class="col-lg-3">
                    <p class="text-danger font-weight-700 text-center"> El boton eliminar te permite destruir el Lugar seleccionado.</p>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
