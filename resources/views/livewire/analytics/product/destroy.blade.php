<div class="title text-left mb-4 d-md-block">
    <span class="title-leading text-primary mb-2 d-block">&nbsp;</span>
    <a onclick="$('#deleteModal').modal('toggle')" class="text-decoration-none"><img src="{{ asset('images/close_icon.svg') }}"> <small class="ms-1 text-muted">Usuń produkt</small></a>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Potwierdź swoją decyzje</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="cart-items">
                        {{--                                 Desktop version --}}
                        <div class="cart-item desktop d-flex align-items-center justify-content-between">
                            <div class="product-details d-flex align-items-center">
                                Czy napewno chcesz usunąć produkt {{$product->sku}}?
                            </div>

                        </div>

                        {{--                                 Mobile version --}}
                        <div class="cart-item mobile d-flex align-items-center justify-content-between">
                            <div class="d-flex">
                                <div class="product-details d-flex align-items-center flex-grow-1">
                                    Czy napewno chcesz usunąć produkt {{$product->sku}}?
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Anuluj</button>
                    <a wire:click="deleteProduct" href="#" type="button" class="btn btn-secondary">Usuń</a>
                </div>
            </div>
        </div>
    </div>

</div>
