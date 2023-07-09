@extends('layouts.layout')

@section('title', 'Carrito')

@section('link')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Productos
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($categories as $category)
                <li><a class="dropdown-item" href="{{ route('home.products', [$category->id]) }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    </li>
@endsection

@section('content')
    <div class="container">
        @if (Session::has('msg'))
            <br>
            <div class="alert alert-success">
                <h5>{!! \Session::get('msg') !!}</h5>
            </div>
        @endif
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
                        @foreach ($carts as $cart)
                            <tr>
                                <td>{{ $cart->product->name }}</td>
                                <td>{{ $cart->cant }}</td>
                                <td>{{ $cart->total }}</td>
                                <td>
                                    <form action="{{ route('home.cart.destroy', [$cart->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger"
                                            onclick="return confirm('¿Desea eliminar el elemento?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if (!$carts->items() == null)
            <form action="{{ route('home.buy') }}" method="post">
                @csrf
                <button class="btn btn-secondary" onclick="return confirm('¿Desea continuar?')">Comprar</button>
            </form>
        @else
            <h5 class="text-center">Carrito Vacio</h5>
        @endif
        {{ $carts->links() }}
    </div>
@endsection
