<div>
    <div class="modal fade" id="addedToCartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dodano do koszyka</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="cart-items">
{{--                         Desktop version--}}
                        <div class="cart-item desktop d-flex align-items-center justify-content-between">
                            <div class="product-details d-flex align-items-center">
                                <div class="img-wrapper">
                                    <img src="{{ asset('images/product_thumbnail.jpg') }}" alt="">
                                </div>
                                <div class="title-wrapper ms-4 fw-light">
                                    <span class="d-block"><b>{{$quantity}}x</b> {{$product->name}}</span>
                                </div>
                            </div>
                            <div class="ms-5 text-end d-flex align-items-center">
                                <div class="fw-light">
                                    <span class="d-block">{{$quantity * $product->getPrice()}} zł</span>
                                    <span class="text-muted d-block">za sztukę {{$product->getPrice()}} zł</span>
                                </div>
                            </div>
                        </div>

{{--                         Mobile version--}}
                        <div class="cart-item mobile d-flex align-items-center justify-content-between">
                            <div class="d-flex">
                                <div class="product-details d-flex align-items-center flex-grow-1">
                                    <div class="img-wrapper">
                                        <img src="{{ asset('images/product_thumbnail.jpg') }}" alt="">
                                    </div>
                                    <div class="title-wrapper ms-4 fw-light">
                                        <span class="d-block"><b id="mobile-qty">{{$quantity}}x</b>  {{$product->name}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <div class="ms-3 text-end d-flex align-items-center">
                                    <div class="fw-light">
                                        <span class="d-block">{{$quantity * $product->getPrice()}} zł</span>
                                        <span class="text-muted d-block">za sztukę {{$product->getPrice()}} zł</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kontynuuj zakupy</button>
                    <a href="{{route('cart')}}" type="button" class="btn btn-primary">Przejdź do koszyka</a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('after-scripts')
    <script>
        var modal = new bootstrap.Modal(document.getElementById('addedToCartModal'), {})
        window.addEventListener('openModal', event => {
            modal.show();
        })
    </script>
@endpush
