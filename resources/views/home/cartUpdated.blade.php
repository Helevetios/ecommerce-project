<div class="modal fade" id="modal-update-cart-{{ $cart->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Carrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updateCart', $cart->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input disabled type="text" name="name" value="{{ $cart->product->name }}"
                            class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Cantidad</label>
                        <input type="text" name="cant" value="{{ $cart->cant }}" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
