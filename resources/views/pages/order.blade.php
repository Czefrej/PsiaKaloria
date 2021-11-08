@extends('layout.main')

@section('content')
    <form action="#">
        <div class="container">
            <div class="row mt-5">
                <div class="col-4">
                    <div class="progress-item active"></div>
                    <span>Twój koszyk</span>
                </div>
                <div class="col-4">
                    <div class="progress-item active"></div>
                    <span>Dostawa i płatność</span>
                </div>
                <div class="col-4">
                    <div class="progress-item"></div>
                    <span>Gotowe</span>
                </div>
            </div>
            <div class="row mt-4 mb-5">

                    <div class="col-lg-8">
                        @if($donation)
                            @auth
                                @livewire('auth-shelter-form')
                            @endauth
                            @guest
                                @livewire('guest-shelter-form')
                            @endguest
                        @else
                            @auth
                                @livewire('auth-customer-form')
                            @endauth
                            @guest
                                @livewire('guest-customer-form')
                            @endguest
                        @endif

                        @livewire('delivery-method-form',['donation'=>$donation,'country_cca2'=>'PL'])

                        @livewire('payment-method-form',['donation'=>$donation,'country_cca2'=>'PL'])

                        @livewire('order-note')
                    </div>

                @livewire('order-summary',['subscription'=>$subscription,'donation'=>$donation])
            </div>
        </div>
        <div class="container d-md-none sticky-btn-wrapper position-sticky bottom-0">
            <div class="bg-white pt-4 pb-4 px-4">
                <button class="btn btn-success d-block w-100">Złóż zamówienie</button>
            </div>
        </div>
    </form>
@endsection
