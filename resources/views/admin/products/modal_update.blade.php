<!-- Modal -->
<div class="modal fade" id="modal-update-product-{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.update', [$product->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" value="{{$product->name}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <select name="category_id" class="form-control">
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
                        <input type="text" name="description" value="{{$product->description}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="number" name="price" value="{{$product->price}}" class="form-control" step="0.01">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>