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
    @if (Session::has('msg'))
        <br>
        <div class="alert alert-success">
            <h5>{!! \Session::get('msg') !!}</h5>
        </div>
    @endif
    <div style="margin-top: 5%; margin-bottom: 5%">
        <h1></h1>
    </div>
    <div class="row">
        @foreach ($products as $product)

        <div class="col-md-4" style="padding-bottom:30px " data-aos="zoom-in-up">
            <div class="card">
                <img src="{{ asset('storage').'/'.$product->image }}" class="card-img-top" width="600px" height="300px">
                <div class="card-body">
                    <h2 style="font-size: 24px" class="card-title">{{$product->name}}</h2>
                    <p style="font-size: 18px">{{$product->description}}</p>
                    <p style="font-size: 16px">Precio ${{$product->price}}</p>
                    @auth
                        @foreach ($stocks as $stock)
                            @if ($stock->product_id == $product->id)
                                @if ($stock->stock == 0)
                                    <p>No hay stock disponible</p>
                                    <button class="btn btn-primary" disabled>Comprar</button>
                                @else
                                    <p>Stock: {{$stock->stock}} Unidades</p>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#product-car-{{$product->id}}">
                                        Añadir Carrito
                                        </button>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#product-add-{{$product->id}}">
                                    Comprar
                                    </button>
                                @endif
                            @endif
                        @endforeach
                    @endauth
                    @guest
                        <button class="btn btn-secondary" disabled>Añadir Carrito</button>
                        <button class="btn btn-secondary" disabled>Comprar</button>
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
                            <input name="name" type="text" value="{{$product->name}}" class="form-control bg-light" disabled>
                        </div>

                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input name="quantity" type="number" class="form-control bg-light" min="1"   onchange="total({{$product->id}},{{$product->price}})" id="quantity-{{$product->id}}">
                        </div>

                        <div class="form-group">
                          <label for="total">Total</label>
                          <p id="resultado-{{$product->id}}" class="form-control bg-light"></p>
                        </div>           

                        <div class="modal-footer">
                            <button class="btn btn-secondary">Comprar</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>

        <div class="modal fade" id="product-car-{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Añadir al carrito  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('home.car.store', [$product->id]) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="name">Producto</label>
                            <input name="name" type="text" value="{{$product->name}}" class="form-control bg-light" disabled>
                        </div>

                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input name="cant" type="number" class="form-control bg-light" min="1"   onchange="car({{$product->id}},{{$product->price}})" id="cant-{{$product->id}}">
                        </div>

                        <div class="form-group">
                          <label for="total">Total</label>
                          <p id="res-{{$product->id}}" class="form-control bg-light"></p>
                        </div>           

                        <div class="modal-footer">
                            <button class="btn btn-secondary">Añadir</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script>
    function total(num1,num2){
        var num3 = document.getElementById("quantity-"+num1).value;
        rest = num2 * num3;
        document.getElementById("resultado-"+num1).innerHTML=""+rest.toFixed(2);
    }
</script>

<script>
    function car(num1,num2){
        var num3 = document.getElementById("cant-"+num1).value;
        rest = num2 * num3;
        document.getElementById("res-"+num1).innerHTML=""+rest.toFixed(2);
    }
</script>
@endsection