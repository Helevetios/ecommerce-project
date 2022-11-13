@extends('admin.categories.layout')

@section('title','Inicio')

@section('content')
<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="{{ asset('storage/uploads/admin-icon.png') }}" width="13%">
    <h1 class="display-5 fw-bold">Bienvenido {{auth()->user()->name}}</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Navega por las opciones para editar, agregar o eliminar las secciones que necesites del sitio</p>
    </div>
  </div>
@endsection