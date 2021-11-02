@extends('layout.main')

@section('content')

    @if(Cart::content()->count()>0)
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title text-left mb-3 mt-5 d-flex gap-2 align-items-center">
                        <h2 class="m-0">Twój koszyk</h2> <span class="text-primary">3 produkty</span>
                    </div>
                </div>
                @livewire('cart-free-delivery')
                <div class="col-lg-8 mt-4">
                    <div class="card p-4">
                        <div class="cart-items">
                            @livewire('cart-table')
                        </div>

                        @livewire('cart-coupon')

                    </div>
                </div>

                @livewire('cart-summary')
            </div>
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center my-5">
                        <img src="{{ asset('images/sad_icon.svg') }}" alt="">
                        <h2 class="mt-4">Twój koszyk jest pusty</h2>
                        <p class="fw-light mt-4">Sprawdź nasze polecane produkty.</p>
                    </div>
                </div>
            </div>
        </div>

    @endif

    @include('sections.home_page.recommended_products')
    @include('sections.home_page.newsletter')

@endsection
