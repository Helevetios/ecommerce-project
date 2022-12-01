@extends('layouts.layout')

@section('title','Busqueda')

@section('content')
    <div class="container">
        <div style="margin-top: 3%; margin-bottom: 3%">
            <h1 class="text-center">{{$error}}</h1>
        </div>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4" style="padding-bottom:30px ">
                <div class="card bg-dark">
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
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product-car-{{$product->id}}">
                                            Añadir Carrito
                                        </button>
                                    @endif
                                @endif
                            @endforeach
                        @endauth
                        @guest
                            <button class="btn btn-primary" disabled>Añadir Carrito</button>
                            <p style="font-size: 14px; padding: 5px">Inicie sesión para poder realizar compras</p>
                        @endguest
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
                                    <button class="btn btn-primary">Añadir</button>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script>
        function car(num1,num2){
            var num3 = document.getElementById("cant-"+num1).value;
            rest = num2 * num3;
            document.getElementById("res-"+num1).innerHTML=""+rest.toFixed(2);
        }
    </script>
@endsection