@extends('layouts.layout')

@section('title','Historial de Compras')

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
    <h1>Historial de Compras</h1>
    <br>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Fecha de Compra</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                <tr>
                    <td>{{$purchase->product->name}}</td>
                    <td>{{$purchase->cant}}</td>
                    <td>{{$purchase->total}}</td>
                    <td>{{$purchase->created_at->format('d-m-Y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            {{$purchases->links()}}
        </div>
    </div>
</div>  
@endsection