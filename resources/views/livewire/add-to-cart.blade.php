<div>
    @if (session()->has('message'))
        <div class="alert alert-danger mt-5">
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-end">
        <div class="quantity">
            <span class="d-block title mt-4 mb-3 text-muted">Ilość</span>
            <select class="form-select border-0 py-2 mt-4" wire:model="quantity">
                @for($i = 1; $i < 100; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
{{--            <div class="cart-quantity-counter">--}}
{{--                @csrf--}}

{{--                <button onclick="decrement()">-</button>--}}
{{--                <input type="text" value="1" onchange="update()" id="qty" class="bg-transparent">--}}
{{--                <button onclick="increment()">+</button>--}}
{{--            </div>--}}
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
        <a href="#" class="btn btn-success d-block" wire:click.prevent="addToCart()" id="button">Dodaj do koszyka</a>
    </div>
</div>


{{--@push('after-scripts')--}}
{{--    <script>--}}
{{--        // setInputFilter(document.getElementById("qty"), function(value) {--}}
{{--        //     return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp--}}
{{--        // });--}}
{{--        // function setInputFilter(textbox, inputFilter) {--}}
{{--        //     ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {--}}
{{--        //         textbox.addEventListener(event, function() {--}}
{{--        //             if (inputFilter(this.value)) {--}}
{{--        //                 this.oldValue = this.value;--}}
{{--        //                 this.oldSelectionStart = this.selectionStart;--}}
{{--        //                 this.oldSelectionEnd = this.selectionEnd;--}}
{{--        //             } else if (this.hasOwnProperty("oldValue")) {--}}
{{--        //                 this.value = this.oldValue;--}}
{{--        //                 this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);--}}
{{--        //             } else {--}}
{{--        //                 this.value = "";--}}
{{--        //             }--}}
{{--        //         });--}}
{{--        //     });--}}
{{--        // }--}}
{{--        //var element = document.getElementById('qty')--}}
{{--        function increment(){--}}
{{--            element.value = parseInt(element.value)+1;--}}
{{--        }--}}

{{--        function decrement(){--}}
{{--            if(parseInt(element.value) > 1)--}}
{{--                element.value = parseInt(element.value)-1;--}}
{{--            else return false;--}}
{{--        }--}}

{{--        function update(){--}}
{{--            if(parseInt(element.value) < 1)--}}
{{--                element.value = 1;--}}
{{--            if(parseInt(element.value) >= 100)--}}
{{--                element.value = 99;--}}
{{--        }--}}

{{--        document.querySelector("#button").addEventListener("click", function(event) {--}}
{{--            // let qty = parseInt(element.value);--}}
{{--            // @this.quantity = qty--}}
{{--            @this.call('addToCart');--}}
{{--            // event.preventDefault();--}}
{{--        }, false);--}}

{{--    </script>--}}
{{--@endpush--}}
