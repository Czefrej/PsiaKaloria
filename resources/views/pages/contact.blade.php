@extends('layout.main')

@section('content')

    <div class="contact-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 d-md-none d-block">
                    <div class="title text-start mb-4">
                        <h2 class="mt-3">Kontakt</h2>
                    </div>
                </div>
                <div class="col-md-4 order-2 order-md-1">
                    <div class="title text-start mb-4 d-md-block d-none">
                        <h2 class="mt-3">Kontakt</h2>
                    </div>
                    <p class="mt-md-5 mt-4 fw-light">
                        OUTERBEST SPÓŁKA Z OGRANICZONĄ ODPOWIEDZIALNOŚCIĄ
                    </p>
                    <div class="contact-details mt-md-5 mt-4">
                        <div class="address-wrapper d-flex flex-row gap-4">
                            <div class="icon-wrapper">
                                <img src="{{ asset('images/address_icon.svg') }}">
                            </div>
                            <div class="text-wrapper address fw-light lh-lg">
                                ul. Twarda 18 <br>
                                00-105 Warszawa <br>
                                NIP: 5252855117
                            </div>
                        </div>
                        <div class="phone-wrapper d-flex flex-row gap-4 mt-4">
                            <div class="icon-wrapper">
                                <img src="{{ asset('images/phone_icon.svg') }}">
                            </div>
                            <div class="text-wrapper phone fw-light">
                                798 680 679
                            </div>
                        </div>
                        <div class="email-wrapper d-flex flex-row gap-4 mt-4">
                            <div class="icon-wrapper">
                                <img src="{{ asset('images/email_icon.svg') }}">
                            </div>
                            <div class="text-wrapper email-address fw-light">
                                kontakt@psiakaloria.pl
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 order-1 order-md-2">
                    <div class="card editable-wrapper px-md-4 px-3 py-4">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-wrapper mb-4">
                                        <label class="mb-1">Imię</label>
                                        <input type="text" class="form-control border-0 py-2" value="a.nowak@gmail.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-wrapper mb-4">
                                        <label class="mb-1">Adres e-mail</label>
                                        <input type="text" class="form-control border-0 py-2" value="a.nowak@gmail.com">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-wrapper mb-4">
                                        <label class="mb-1 d-block">Wiadmość</label>
                                        <textarea class="form-control border-0" cols="30" rows="10">Chcę zapytać o...</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-wrapper d-flex gap-4 justify-content-end">
                                <a href="#" class="btn btn-primary w-50 w-mobile-100">Zaloguj się</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
