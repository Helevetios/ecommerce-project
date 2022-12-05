@extends('admin.categories.layout')

@section('title','Ventas')

@section('content')
    <div class="container">
        <div style="margin-top: 5%; margin-bottom: 5%">
            <h1>Ventas</h1>
        </div>
        <div class="table-responsive">
            <table class="table" id="table_id">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                    <tr>
                        <td>{{$sale->user->name}}</td>
                        <td>{{$sale->user->email}}</td>
                        <td>{{$sale->product->name}}</td>
                        <td>{{$sale->cant}}</td>
                        <td>{{$sale->total}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection