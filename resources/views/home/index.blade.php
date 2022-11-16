@extends('layouts.layout')

@section('title','Home')

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
<h1>Home</h1>
@auth
<p>Bienvenido {{auth()->user()->name}}, estas autenticado</p>
<a href="{{ route('logout') }}">Logout</a>
@endauth

@guest
<p>Para ver el contenido inicia sesion</p>
@endguest

@endsection