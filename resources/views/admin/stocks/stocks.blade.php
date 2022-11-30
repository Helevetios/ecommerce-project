@extends('admin.categories.layout')

@section('title','Stocks')

@section('content')
<div class="container">
    <div class="row">
        <div style="margin-top: 5%; margin-bottom: 5%">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-stock-add">Agregar
                Nuevo</button>
        </div>
        <table class="table" id="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Producto</th>
                    <th>Stock</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stocks as $stock)
                <tr>
                    <td>{{$stock->id}}</td>
                    <td>{{$stock->product->name}}</td>
                    <td>{{$stock->stock}}</td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-stock-update-{{$stock->id}}">Editar</button>
                    </td>
                </tr>
                @include('admin.stocks.modal_update')
                @endforeach
            </tbody>
        </table>
    </div>
    {{$stocks->links()}}
</div>

<!-- Modal -->
<div class="modal fade" id="modal-stock-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('stocks.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="product_id">Producto</label>
                        <select name="product_id" class="form-control">
                            @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" class="form-control">
                        <div class="modal-footer">
                            <button class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('data_table')
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        });
    </script>
@endsection
