@extends('layouts.panel')

    @section('titulo','Gestionar Eventos!')
@section('content')
<div class="container mt--8 pb-5">
    <div class="card bg-secondary shadow">
        <div class="card-header">
            <h1 class="text-center">Control total de eventos <i class="far fa-calendar-alt text-blue"></i> </h1>
        </div>
        <div class="card-body">
            <p class="text-center">En este apartado encontraras las diferentes opciones para gestionar los eventos</p>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                {{-- botones --}}
                <div class="col-lg-3 text-center">
                    <a href="{{ route('eventos-crear') }}" class="btn btn-success text-white">Crear <i class="	fas fa-gavel"></i> </a>
                </div>
                <div class="col-lg-3 text-center">
                    <a href="{{ route('eventos-leer') }}" class="btn btn-primary text-white">Leer <i class="	fas fa-eye"></i> </a>
                </div>
                <div class="col-lg-3 text-center">
                    <a  href="{{ route('eventos-actualizar') }}" class="btn btn-dark text-white ">Actualizar <i class="	fas fa-pencil-alt"></i></a>
                </div>
                <div class="col-lg-3 text-center">
                    <a href="{{ route('eventos-eliminar') }}" class="btn btn-danger text-white">Eliminar <i class="	fas fa-trash-alt"></i></a>
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
  </div>
@endsection
