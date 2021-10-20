{{-- Desktop version --}}
<div class="cart-item desktop d-flex align-items-center justify-content-between">
    <div class="product-details d-flex align-items-center">
        <div class="img-wrapper">
            <img src="{{ asset('images/product_thumbnail.jpg') }}" alt="">
        </div>
        <div class="title-wrapper ms-4 fw-light">
            <span class="d-block">Baton AS Deluxe</span>
            <span class="d-block">- 85% mięsa</span>
        </div>
    </div>
    <div class="ms-5 fw-light">
        <span>Indyk</span>
    </div>
    <div class="cart-quantity-counter ms-5">
        <button>-</button>
        <input type="text" value="1">
        <button>+</button>
    </div>
    <div class="ms-5 text-end d-flex align-items-center">
        <div class="fw-light">
            <span class="d-block">79,80 zł</span>
            <span class="text-muted d-block">za sztukę 79,80 zł</span>
        </div>
        <div class="ms-5">
            <a href="#">
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
                <span class="d-block">Baton AS Deluxe - 85% mięsa (dłuższa nazwa)</span>
                <span class="fw-light">Indyk</span>
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
            <button>-</button>
            <input type="text" value="1">
            <button>+</button>
        </div>
        <div class="ms-3 text-end d-flex align-items-center">
            <div class="fw-light">
                <span class="d-block">79,80 zł</span>
                <span class="text-muted d-block">za sztukę 79,80 zł</span>
            </div>
        </div>
    </div>
</div>
