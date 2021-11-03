<div class="card p-4 mt-4" wire:key="payment-method">
    <div class="title d-flex align-items-center">
        <h2 class="m-0">Sposób płatności</h2>
    </div>
    <div class="row">
        <div class="col-md-10 col-12">
            <div class="delivery-list mt-4" wire:key="payment-method-loop">
                @foreach($methods as $method)
                    <a wire:key="{{$method->name}}-{{$method->id}}" href='#' class="delivery-list__item d-flex justify-content-between align-items-center @if($selected==$method->id) active @endif" wire:click.prevent="select({{$method->id}})">
                        <div class="indentity-wrapper d-flex gap-md-4 gap-2 align-items-center">
                            <img src="{{$method->thumbnail}}" alt="">
                            <span class="name">{{$method->name}}</span>
                        </div>
                        <div class="price-wrapper">
                            {{$method->service_fee}} zł
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
