@extends('layouts.panel')
@section('titulo','Inicio')
@section('content')
<div class="container-fluid pb-4 overflow-hidden">
    <div class="card bg-transparent bg-white mt-5 shadow">
      <div class="card-header ">
        <h1 class="text-center">Bienvenido a  <span class="font-weight-900">TravelTime</span> </h1>
      </div>
      <div class="card-body">
       <p class="text-dark font-weight-500">Somos una plataforma web encargada de instruir a los turistas sobre los <span class="text-primary ">eventos</span>  y <span class="text-danger">lugares de interes</span>.</p>
      </div>

      <div class="mt-5 d-block mx-auto">
        <iframe  autoplay="true" width="560" height="315" src="https://www.youtube.com/embed/8hP7N-THoic" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
        <span>todos los derechos a sus respectivos dueños.</span>
      </div>
    </div>
  </div>
@endsection
