@extends('admin.products.layout')

@section('title','Stocks')
    
@section('content')
    <div class="container">
        <div class="row">
            <div style="margin-top: 5%; margin-bottom: 5%">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-stock-add">Agregar
                    Nuevo</button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Producto</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $stock)
                    <tr>
                        <td>{{$stock->id}}</td>
                        <td>{{$stock->product->name}}</td>
                        <td>{{$stock->stock}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection