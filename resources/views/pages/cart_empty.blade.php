@extends('layout.main')

@section('content')

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
    </div>

    @include('sections.home_page.recommended_products')
    @include('sections.home_page.newsletter')

@endsection
