@extends('layouts.layout')

@section('title','Home')


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