@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="title text-center mb-4 d-md-block d-block my-5">
                        <img src="{{ asset('images/smile_icon.svg') }}" alt="">
                        <h2 class="mt-5">Potwierdź swój adres e-mail</h2>
                        <p class="mt-4 mb-5 fw-light">Dziękujemy za rejestrację, na Twój adres e-mail wysłaliśmy wiadomość z prośbą o potwierdzenie.</p>
                    </div>
                </div>
                <div class="clear-both"></div>
                <div class="col-md-4">
                    <div class="text-center">
                        <a href="#" class="text-decoration-none"><span class="d-block text-muted">Brak wiadomości?</span></a>
                    </div>
                    <div class="btn-wrapper d-flex gap-4 mt-3">
                        <a href="#" class="btn btn-primary w-100">Wyślij ponownie</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
