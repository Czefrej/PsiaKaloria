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

                        <div class="card p-4 mt-4 pb-4 pt-5">
                            <label class="mb-2">Informacje do zamówienia <span class="text-muted ps-2">(opcjonalnie)</span></label>
                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>

                @livewire('order-summary',['subscription'=>$subscription,'donation'=>$donation])
            </div>
        </div>
    </form>
@endsection
