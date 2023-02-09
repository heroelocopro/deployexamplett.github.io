@extends('layouts.panel')
@section('titulo','Lugares')
@section('content')
<div class="container-fluid pb-4 overflow-hidden">
    <div class="card bg-transparent bg-white mt-5 shadow">
      <div class="card-header ">
        <h1 class="text-center"> Lugares</h1>
      </div>
      <div class="card-body">
        <p class="text-center">En este apartado se visualizan todos los Lugares
        </p>
      </div>
    </div>
    <div class="card bg-transparent bg-white mt-5 shadow">
        @foreach ($lugares as $lugar )
            
       
        <div class="card-header ">
            <h1 class="text-center"> {{ $lugar->nombre }} </h1>
        </div>
        <div class="card-body">
            
            <div class="row">
                {{-- imagen --}}
                <div class="col-lg-6"> <img class="img-fluid text-center d-block mx-auto rounded-3" src="{{ asset('img/lugares/'.$lugar->imagen) }}" alt="" srcset=""></div>
                 {{-- ubicación --}}
                <div class="col-lg-6">  <iframe  class="d-block mx-auto rounded-3 border " height="100%" width="100%" src="{{ $lugar->ubicacion }}" frameborder="0"></iframe></div>
            </div>
         
                   
                  
          {{-- descripcion --}}
          <p class="text-center text-dark font-weight-700 my-5"> {{ $lugar->descripcion }} </p>
          <div class="">
            <hr> 
           </div>  
          {{-- eventos --}}
          <h3>Eventos que se realizan en ese lugar</h3>
<h5>dale clic para ver el evento mas detalladamente</h5>
           @foreach ($lugar->eventos as $evento )
             <li>
              <a class="text-danger" href="{{ route('eventos-buscar', $evento->id ) }}">{{ $evento->nombre }}</a>
            </li>
           @endforeach
        </div>
        @endforeach
    </div>
    {{-- paginacion --}}
    <div class="text-center d-flex mx-auto justify-content-center align-items-center">
        {{ $lugares->links() }}
    </div>
  </div>
@endsection