@extends('layouts.panel')
@section('titulo','Eventos')
@section('content')
<div style="width: 110%"  class="container-fluid pb-4 overflow-hidden ">
    <div class="card bg-transparent bg-white mt-5 shadow">
      <div class="card-header ">
        <a href="{{ route('eventos-gestion') }}" class="btn btn-github">Volver</a>
        <h1 class="text-center"> Eventos</h1>
      </div>
      <div class="card-body">
        <p class="text-center">
            Tabla de  los eventos
        </p>
      </div>
    </div>
    <div  class="card bg-transparent bg-white mt-5 shadow ">
        <div class="card-header ">
         @if (count($eventos) == 0)
           <h2 class="text-center"> No hay Eventos Registrados</h2>
         @endif
        </div>
        <div class="card-body">
            <table class="table  ">
                <thead class="">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">IMAGEN</th>
                    <th scope="col">FECHA INICIO</th>
                    <th scope="col">FECHA FIN</th>
                    <th scope="col">DEPARTAMENTO</th>
                    <th scope="col">CIUDAD</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($eventos as $evento )
                    
                    <tr>
                        <th scope="row">{{ $evento->id }}</th>
                        <td>{{ $evento->nombre }}</td>
                        <td class="text-wrap"><p class="text-wrap d-flex flex-wrap">{{ Str::limit($evento->descripcion, 10) }}</p></td>
                        <td><img class="img-fluid w-25" src="{{ asset('img/eventos/'.$evento->imagen) }}" alt=""></td>
                        <td>{{ $evento->fechaInicio }}</td>
                        <td>{{ $evento->fechaFin }}</td>
                        {{-- bucle pa nombre depar --}}
                        @foreach ($departamentos as $departamento )
                        @if ($departamento->id == $evento->departamento_id)
                        <td>{{ $departamento->nombre }}</td>
                        @endif
                        @endforeach
                        {{-- cerro --}}
                        {{-- bucle para encontrar el nombre soy flojo  --}}
                        @foreach ($ciudades as $ciudad )
                            @if ($ciudad->id == $evento->ciudad_id)
                            <td>{{ $ciudad->nombre }}</td>
                            @endif
                        @endforeach
                        {{-- cerro --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $eventos->links() }}
  </div>
@endsection