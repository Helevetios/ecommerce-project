<!-- Modal -->
<div class="modal fade" id="modal-stock-update-{{$stock->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('stocks.update', [$stock->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <select name="product_id" class="form-control">
                            <option value="{{$stock->product->id}}">{{$stock->product->name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" value="{{$stock->stock}}" class="form-control">
                        <div class="modal-footer">
                            <button class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>