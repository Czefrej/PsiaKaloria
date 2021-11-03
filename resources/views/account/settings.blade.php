@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    @include('sidebars.account_sidebar')
                </div>
                <div class="col-md-8 position-relative pb-5">
                    <img src="{{ asset('images/square_pattern.svg') }}" alt="" class="square-pattern-top">
                    <img src="{{ asset('images/square_pattern.svg') }}" alt="" class="square-pattern-bottom">
                    <div class="title text-left mb-5 d-md-block d-none">
                        <span class="title-leading text-primary mb-2 d-block">&nbsp;</span>
                        <h2>Ustawienia</h2>
                    </div>
                    <div class="card-wrapper">
                        <div class="card px-4 pt-md-5 pt-4 pb-4">
                            <div class="card-title d-flex justify-content-between">
                                <h5>Dane osobowe</h5>
                                <a href="{{route('account.edit')}}" class="text-decoration-none action"><span class="text-primary fw-light">Edytuj</span></a>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4 mb-md-0 mb-4">
                                    <span class="text-muted d-block fw-ligther">Imię i nazwisko</span>
                                    <span class="d-block fw-lighter value-text">Anna Nowak</span>
                                </div>
                                <div class="col-md-4 mb-md-0 mb-4">
                                    <span class="text-muted d-block fw-ligther">Adres e-mail</span>
                                    <span class="d-block fw-lighter value-text">a.nowak@gmail.com</span>
                                </div>
                                <div class="col-md-4">
                                    <span class="text-muted d-block fw-ligther">Numer telefonu</span>
                                    <span class="d-block fw-lighter value-text">758 206 055</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrapper mt-3">
                        <div class="card px-4 pt-md-5 pt-4 pb-4">
                            <div class="card-title d-flex justify-content-between">
                                <h5>Adresy</h5>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 mb-md-0 mb-4">
                                    <h5>Anna Nowak</h5>
                                    <span class="d-block fw-lighter value-text mt-3">
                                        ul. Przykładowa 21 m 5 <br>
                                        15-842 Białystok, Polska <br>
                                        +48 852 456 111
                                    </span>
                                    <div class="actions d-flex gap-4 mt-3">
                                        <a href="#" class="text-decoration-none"><span class="text-primary fw-light">Edytuj</span></a>
                                        <a href="#" class="text-decoration-none"><span class="text-primary fw-light">Usuń</span></a>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-md-0 mb-4">
                                    <h5 class="fw-light">Anna Nowak</h5>
                                    <span class="d-block fw-lighter value-text mt-3">
                                        ul. Przykładowa 21 m 5 <br>
                                        15-842 Białystok, Polska <br>
                                        +48 852 456 111
                                    </span>
                                    <div class="actions d-flex gap-4 mt-3">
                                        <a href="#" class="text-decoration-none"><span class="text-primary fw-light">Edytuj</span></a>
                                        <a href="#" class="text-decoration-none"><span class="text-primary fw-light">Usuń</span></a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="fw-light">Anna Nowak</h5>
                                    <span class="d-block fw-lighter value-text mt-3">
                                        ul. Przykładowa 21 m 5 <br>
                                        15-842 Białystok, Polska <br>
                                        +48 852 456 111
                                    </span>
                                    <div class="actions d-flex gap-4 mt-3">
                                        <a href="#" class="text-decoration-none"><span class="text-primary fw-light">Edytuj</span></a>
                                        <a href="#" class="text-decoration-none"><span class="text-primary fw-light">Usuń</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrapper mt-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card px-4 pt-md-5 pt-4 pb-4">
                                    <div class="card-title d-flex justify-content-between">
                                        <h5>Hasło</h5>
                                    </div>
                                    <div class="action">
                                        <a href="{{route('account.password')}}" class="btn btn-primary d-md-inline-block d-block">
                                            Zmień hasło
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card px-4 pt-md-5 pt-4 pb-4 mt-md-0 mt-3">
                                    <div class="card-title d-flex justify-content-between">
                                        <h5>Konto</h5>
                                    </div>
                                    <div class="action">
                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary d-md-inline-block d-block">
                                            Usuń konto
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center py-5 px-4">
                <h5>Opuszczasz nas?</h5>
                <p class="mt-4 fw-light">Pamiętaj jeżeli usuniesz konto, stracisz wszystkie dane o historii zamówień oraz swoich subskrypcjach.</p>
                <div class="btns mt-4 d-flex gap-3 justify-content-center">
                    <a href="#" class="btn btn-primary-light" data-bs-dismiss="modal">Usuwam konto</a>
                    <a href="#" class="btn btn-primary" data-bs-dismiss="modal">Anuluj</a>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
