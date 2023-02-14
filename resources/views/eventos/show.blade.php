@extends('layouts.panel')
@section('titulo','Eventos')
@section('content')
<div class="container-fluid pb-4 overflow-hidden">
    <div class="card bg-transparent bg-white mt-5 shadow">
      <div class="card-header ">
        <a href="{{ route('eventos-index') }}" class="btn btn-github">Volver</a>
        <h1 class="text-center"> Eventos</h1>
      </div>
      <div class="card-body">
        <p class="text-center">En este apartado se visualizan los Eventos
        </p>
      </div>
    </div>
    <div class="card bg-transparent bg-white mt-5 shadow">
        <div class="card-header ">
          {{-- fechas y nombre --}}
          <div class="row">
            <div class="col-lg-4 text-center">

              Fecha de inicio: <span class="text-success ">{{ $evento->fechaInicio }}</span>
            </div>
            <div class="col-lg-4">

              <h1 class="text-center"> {{ $evento->nombre }} </h1>
            </div>
            <div class="col-lg-4 text-center">

              Fecha de fin: <span class="text-danger ">{{ $evento->fechaFin }}</span>
            </div>
          </div>
        </div>
        <div class="card-body">
          {{-- consulta interna de departamento y ciudades --}}
          <span class="text-dark font-weight-900">Ubicacion</span>
          @foreach ($ciudades as $ciudad )
          @if ($ciudad->id == $evento->ciudad_id)
        {{ $ciudad->nombre }},
          @endif
        @endforeach
          @foreach ($departamentos as $departamento )
            @if ($departamento->id == $evento->departamento_id)
            {{ $departamento->nombre }}.
            @endif
          @endforeach
{{-- imagen --}}
 <img class="img-fluid text-center d-block mx-auto rounded-3 my-3" src="{{ asset('/storage/images/eventos/'.$evento->imagen) }}" alt="" srcset="">

          {{-- descripcion --}}
          <p class="text-center text-dark font-weight-700 my-5"> {{ $evento->descripcion }} </p>

          <div class="">
            <hr> 
           </div>  

{{-- lugares donde ocurre el evento --}}
<h3>Lugares donde ocurre el evento</h3>
<ul>

  @foreach ($evento->lugares as $lugar )
  <li>
    <a class="text-danger" href="{{ route('lugares-buscar',$lugar->id) }}">{{ $lugar->nombre }}</a>
  </li>
  @endforeach
</ul>
        </div>
    </div>
  </div>

  {{-- comentarios --}}
<hr>
<div class="container-fluid">
  
  <h1 class="text-center text-white">comentarios</h1>

@if (auth()->check())

<div class="container rounded-3">
<img style="width: 5rem" class=" img-fluid rounded-circle" src="{{ asset('img/perfil/'.auth()->user()->perfil) }}" alt="" srcset="">
<h1 class="justify-content-center align-items-center text-white" >{{ auth()->user()->name }}</h1>
</div>
<div class="mb-5">
<form method="POST" action="{{ route('comentario-eventos-crear') }}">
  @method("post")
  @csrf
  <textarea class="form-control-plaintext  bg-white text-dark mb-2" name="comentario" id="" cols="30" rows="10"></textarea>
  <input value="{{ auth()->user()->id }}" type="hidden" name="usuario_id">
  <input name="evento_id" value="{{ $evento->id }}" type="hidden">
  <button type="submit" class="btn btn-success">Comentar</button>
</form>
</div>
@else

@endif
<div style="box-shadow: 0px 0px 20px 6px #090b6f85; max-height: 10%"   class="row  border rounded-3 container bg-white text-dark  " >
@foreach ($comentarioEventos as $comentario ) 
@if ($comentario->evento_id == $evento->id)
@foreach ($usuarios as $usuario )
@if ($usuario->id == $comentario->usuario_id)
      <div style="width: 100%;max-width: 100px; height: 100px"  class="col-lg-2  p-0 "> 
        <img style="height: 100%"  class="img-fluid  d-flex justify-content-center align-items-center " src="{{ asset('img/perfil/'.$usuario->perfil) }}" alt="" srcset="">
      </div>  
     
      <div  class="col-lg-10 ">
           <h3 class="text-danger">{{ Str::upper($usuario->name) }}</h3>
        <h4>{{ $comentario->comentario }}</h4> <hr>
      </div>

      @endif
      @endforeach
      

      @endif
      @endforeach
    </div>
    <br>

</div>
@endsection
