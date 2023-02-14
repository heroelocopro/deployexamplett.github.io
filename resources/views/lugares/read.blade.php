@extends('layouts.panel')
@section('titulo','Eventos')
@section('content')
<div style="width: 110%" class="container-fluid pb-4 overflow-hidden ">
  <div class="card bg-transparent bg-white mt-5 shadow">
    <div class="card-header ">
      <a href="{{ route('lugares-gestion') }}" class="btn btn-primary">Volver</a>
      <h1 class="text-center"> Lugares</h1>
    </div>
    <div class="card-body">
      <p class="text-center">
        Tabla de los Lugares
      </p>
    </div>
  </div>
  <div class="card bg-transparent bg-white mt-5 shadow ">
    <div class="card-header ">
      @if (count($lugares) == 0)
      <h2 class="text-center">No hay Lugares Registrados</h2>
      @endif
    </div>
    <div class="card-body">
      <table class="table  ">
        <thead class="">
          <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">DESCRIPCION</th>
            <th scope="col">IMAGEN</th>
            <th scope="col">UBICACION</th>
          </tr>
        </thead>
        <tbody class="text-center">
          @foreach ($lugares as $lugar )

          <tr>
            <th scope="row">{{ $lugar->id }}</th>
            <td>{{ $lugar->nombre }}</td>
            <td class="text-wrap">
              <p class="text-wrap d-flex flex-wrap">{{ Str::limit($lugar->descripcion, 30) }}</p>
            </td>
            <td><img class="img-fluid w-25" src="{{ asset('storage/images/lugares/'.$lugar->imagen) }}" alt=""></td>
            <td><iframe class="d-block mx-auto rounded-3 border " height="100%" width="100%" src="{{ $lugar->ubicacion }}" frameborder="0"></iframe></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  {{ $lugares->links() }}
</div>
@endsection
