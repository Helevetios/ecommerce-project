@extends('admin.categories.index')

@section('title','Categorias')

@section('content')
<div class="container">

    <div class="row">
        <div style="margin-top: 5%; margin-bottom: 5%">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Nueva</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-update-category-{{$category->id}}">Editar</button>
                    </td>
                    <td>
                        <form action="{{ route('categories.delete', [$category->id]) }}" method="post">
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('¿Estas seguro de borrar este elemento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @include('admin.categories.modal_update')
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <label for="name">Categoria</label>
                    <input type="text" name="name" class="form-control">
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection