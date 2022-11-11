@extends('layouts.layout')

@section('title','Usuario')

@section('content')
    <div class="container">
        <br>
        <h1>Datos del Usuario</h1>
        <br>
        <div class="row">
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
@endsection