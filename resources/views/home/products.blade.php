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
                        @foreach ($stocks as $stock)
                            @if ($stock->product_id == $product->id)
                                @if ($stock->stock == 0)
                                    <p>No disponible</p>
                                    <button class="btn btn-primary" disabled>Comprar</button>
                                @else
                                    <p>Stock: {{$stock->stock}} Unidades</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product-add-{{$product->id}}">
                                    Comprar
                                    </button>
                                @endif
                            @endif
                        @endforeach
                    @endauth
                    @guest
                        <button class="btn btn-primary" disabled>Comprar</button>
                        <p style="font-size: 14px; padding: 5px">Inicie sesión para poder realizar compras</p>
                    @endguest
                </div>
            </div>
        </div>

        <div class="modal fade" id="product-add-{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Comprar</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('home.purchase', [$product->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Producto</label>
                            <input name="name" type="text" value="{{$product->name}}" class="form-control" disabled>
                        </div>
      
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input name="quantity" type="number" class="form-control" min="1" value="1">
                        </div>
                        
                        <div class="modal-footer">
                            <button class="btn btn-primary">Comprar</button>
                        </div>
                        
                    </form>
                </div>
              </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection