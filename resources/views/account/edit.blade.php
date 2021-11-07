@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    @include('sidebars.account_sidebar')
                </div>
                <div class="col-lg-4">
                    <div class="title text-left mb-4 d-md-block d-none">
                        <span class="title-leading text-primary mb-2 d-block">&nbsp;</span>
                        <a href="{{route('account.settings')}}" class="text-decoration-none"><img src="{{ asset('images/back_arrow_icon.svg') }}"> <small class="ms-1 text-muted">Wróć do ustawień</small></a>
                        <h2 class="mt-3">Dane osobowe</h2>
                    </div>
                    <div class="editable-wrapper">
                        <form>
                            <div class="input-wrapper mb-4">
                                <label class="mb-1">Imię</label>
                                <input type="text" class="form-control border-0 py-2" value="Anna">
                            </div>
                            <div class="input-wrapper mb-4">
                                <label class="mb-1">Nazwisko</label>
                                <input type="text" class="form-control border-0 py-2" value="Nowak">
                            </div>
                            <div class="input-wrapper mb-4">
                                <label class="mb-1">Adres e-mail</label>
                                <input type="text" class="form-control border-0 py-2" value="a.nowak@gmail.com">
                            </div>
                            <div class="input-wrapper mb-4">
                                <label class="mb-1">Numer telefonu</label>
                                <input type="text" class="form-control border-0 py-2" value="123 456 789">
                            </div>
                            <div class="btn-wrapper d-flex gap-4">
                                <a href="{{route('account.settings')}}" class="btn btn-primary-light w-50">Anuluj</a>
                                <a href="#" class="btn btn-primary w-50">Zapisz zmiany</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
