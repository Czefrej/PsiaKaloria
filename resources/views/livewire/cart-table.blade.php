<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    {{-- Desktop version --}}

    @foreach($cart as $row)
        <div id="{{$row->rowId}}">
            <div class="cart-item desktop d-flex align-items-center justify-content-between">
                <div class="product-details d-flex align-items-center">
                    <div class="img-wrapper">
                        <img src="{{ asset('images/product_thumbnail.jpg') }}" alt="">
                    </div>
                    <div class="title-wrapper ms-4 fw-light">
                        <span class="d-block">{{$row->model->name}}</span>
                    </div>
                </div>
                <div class="cart-quantity-counter ms-5">
                    <button wire:click.prevent="decrement('{{$row->rowId}}')">-</button>
                    <input type="text" wire:model="quantity.{{$row->rowId}}" class="bg-transparent">
                    <button wire:click.prevent="increment('{{$row->rowId}}')">+</button>
                </div>
                <div class="ms-5 text-end d-flex align-items-center">
                    <div class="fw-light">
                        <span class="d-block">{{$row->total}} zł</span>
                        <span class="text-muted d-block">za sztukę {{$row->model->getPrice()}} zł</span>
                    </div>
                    <div class="ms-5">
                        <a href="#" wire:click.prevent="remove('{{$row->rowId}}')">
                            <img src="{{ asset('images/close_icon.svg') }}" width="10">
                        </a>
                    </div>
                </div>
            </div>

            {{-- Mobile version --}}
            <div class="cart-item mobile d-flex align-items-center justify-content-between">
                <div class="d-flex">
                    <div class="product-details d-flex align-items-center flex-grow-1">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/product_thumbnail.jpg') }}" alt="">
                        </div>
                        <div class="title-wrapper ms-4 fw-light">
                            <span class="d-block">{{$row->model->name}}</span>
                        </div>
                    </div>
                    <div class="ms-2">
                        <a href="#">
                            <img src="{{ asset('images/close_icon.svg') }}" width="10">
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <div class="cart-quantity-counter ms-5">
                        <button wire:click.prevent="decrement('{{$row->rowId}}')">-</button>
                        <input type="text" wire:model="quantity.{{$row->rowId}}" class="bg-transparent">
                        <button wire:click.prevent="increment('{{$row->rowId}}')">+</button>
                    </div>
                    <div class="ms-3 text-end d-flex align-items-center">
                        <div class="fw-light">
                            <span class="d-block">{{$row->total}} zł</span>
                            <span class="text-muted d-block">za sztukę {{$row->model->getPrice()}} zł</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-items-separator"></div>
        </div>
    @endforeach

</div>
