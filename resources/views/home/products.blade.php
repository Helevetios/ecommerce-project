@extends('layouts.layout')

@section('title','Producto')

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
    <div style="margin-top: 5%; margin-bottom: 5%">
        <h1></h1>
    </div>
    <div class="row">
        @foreach ($products as $product)

        <div class="col-md-4" style="padding-bottom:30px ">
            <div class="card">
                <img src="{{ asset('storage').'/'.$product->image }}" class="card-img-top">
                <div class="card-body">
                    <h2 style="font-size: 24px" class="card-title">{{$product->name}}</h2>
                    <p style="font-size: 18px">{{$product->description}}</p>
                    <p style="font-size: 16px">Precio ${{$product->price}}</p>
                    @auth
                        <button class="btn btn-primary">Comprar</button>
                    @endauth
    
                    @guest
                        <button class="btn btn-primary" disabled>Comprar</button>
                        <p style="font-size: 14px; padding: 5px">Inicie sesión para poder realizar compras</p>
                    @endguest
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection