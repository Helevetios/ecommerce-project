@extends('admin.categories.layout')

@section('title','Productos')

@section('content')
<div class="container">
    <div class="row">
        <div style="margin-top: 5%; margin-bottom: 5%">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-product-add">Agregar
                Nuevo</button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Imagen</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>
                            <img src="{{ asset('storage').'/'.$product->image }}" style="width: 100px">
                        </td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-update-product-{{$product->id}}">Editar</button>
                        </td>
                        <td>
                            <form action="{{ route('products.delete', [$product->id]) }}" method="post">
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('¿Estas seguro de borrar este elemento?')">Eliminar</button>
                            </form>                        
                        </td>
                    </tr>
                    @include('admin.products.modal_update')
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-product-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <select name="category_id" class="form-control">
                            <option value="">Elegir Categoria</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="text" name="description" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="number" name="price" class="form-control" step="0.01">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection