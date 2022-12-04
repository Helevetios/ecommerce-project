@extends('layouts.layout')

@section('title','Carrito')

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
    <div class="row">
        <div style="margin-top: 5%; margin-bottom: 5%">
            <h1>Carrito</h1>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                    <tr>
                        <td>{{$car->product->name}}</td>
                        <td>{{$car->cant}}</td>
                        <td>{{$car->total}}</td>
                        <td>
                            <form action="{{ route('home.car.destroy', [$car->id]) }}" method="post">
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('¿Desea eliminar el elemento?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>
    <form action="{{ route('home.buy') }}" method="post">
        @csrf
        <button class="btn btn-secondary" onclick="return confirm('¿Desea continuar?')">Comprar</button>
    </form>
    {{$cars->links()}}
</div>
@endsection