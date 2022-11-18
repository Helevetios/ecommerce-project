@extends('layouts.layout')

@section('title','Usuario')

@section('link')
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        Productos
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach ($categories as $category)
        <li><a class="dropdown-item" href="{{ route('home.products', [$category->id]) }}">{{$category->name}}</a></li>
        @endforeach
    </ul>
</li>
@endsection

@section('content')
<div class="container">
    <br>
    <h1>Datos del Usuario</h1>
    <br>

    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{auth()->user()->name}}</td>
                        <td>{{auth()->user()->email}}</td>
                        <td>{{auth()->user()->phone}}</td>
                        <td>{{auth()->user()->address}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection