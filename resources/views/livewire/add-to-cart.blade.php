<div>
    <div class="d-flex justify-content-between align-items-end">
        <div class="quantity">
            <span class="d-block title mt-4 mb-3 text-muted">Ilość</span>
            <div class="cart-quantity-counter">
                @csrf
                <button wire:click.prevent="decrement">-</button>
                <input type="text" wire:model="quantity" class="bg-transparent">
                <button wire:click.prevent="increment">+</button>
            </div>
        </div>
        <div class="product-price-wrapper d-none d-md-flex justify-content-end align-items-end flex-column gap-2 mt-4">
            <span class="title fw-lighter mb-2">Koszt</span>
            <div class="product-price">
                <span class="product-price-discount"><del>{{$product->regular_price}} zł</del></span>
                <span class="product-price text-primary fw-bold">{{$product->gross_base_price}} zł</span>
            </div>
        </div>
    </div>
    {{--                    <span class="text-primary fw-light d-none d-md-block mt-2">*dodaj jeszcze 2 szt. aby otrzymać rabat</span>--}}

    <div class="add-to-cart-wrapper mt-4">
        <a href="#" class="btn btn-success d-block" wire:click.prevent="addToCart">Dodaj do koszyka</a>
    </div>
</div>
