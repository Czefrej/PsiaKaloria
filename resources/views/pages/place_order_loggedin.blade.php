@extends('layout.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="text-center my-5">
                    <img src="{{ asset('images/smile_icon.svg') }}" alt="">
                    <h2 class="mt-4">Dziękujemy za zakupy</h2>
                    <p class="fw-light mt-4 mb-5">Dodaliśmy 23 punkty do Twojego konta. Twoja przesyłka zostanie wysłana w przeciągu 1-2 dni roboczych.</p>
                    <a href="#" class="btn btn-primary d-block mx-3">Strona główna</a>
                </div>
            </div>
            </div>
        </div>
    </div>

    @include('sections.home_page.recommended_products')
    @include('sections.home_page.newsletter')

@endsection
