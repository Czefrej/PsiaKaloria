<div class="card p-4 mt-4">
    <div class="title d-flex align-items-center">
        <h2 class="m-0">Dostawa</h2>
    </div>
    <div class="row">
        <div class="col-md-10 col-12">
            <div class="delivery-list mt-4">
                @if($this->valid)
                    @if($methods != null)
                        @if($methods->count() > 0)
                            @foreach($methods as $method)
                                <a href='#' wire:click.prevent="selectDelivery({{$method->id}})" class="delivery-list__item d-flex justify-content-between align-items-center @if($selected == $method->id) active @endif">
                                    <div class="indentity-wrapper d-flex gap-md-4 gap-2 align-items-center">
                                        <img src="{{$method->thumbnail}}" alt="">
                                        <span class="name">{{$method->name}}</span>
                                    </div>
                                    <div class="price-wrapper">
                                        {{$method->gross_price_per_package}} zł
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <span class="fw-light">Wybierz najpierw sposób płatności.</span>
                        @endif
                    @else
                        <span class="fw-light">Wybierz najpierw sposób płatności.</span>
                    @endif

                    @error('selected') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                @else
                    <span class="fw-light">Uzupełnij najpierw dane teleadresowe.</span>
                @endif
            </div>
        </div>
    </div>
</div>
