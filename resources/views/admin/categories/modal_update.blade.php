<!-- Modal -->
<div class="modal fade" id="modal-update-category-{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.update', [$category->id]) }}" method="post">
                    @csrf
                    <label for="name">Categoria</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                    <div class="modal-footer">
                        <button class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>