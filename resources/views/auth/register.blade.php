@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="title text-center mb-4 d-md-block d-none my-5">
                        <h2 class="mt-3">Załóż konto</h2>
                    </div>
                    <div class="editable-wrapper">
                        <form>
                            <div class="input-wrapper mb-4">
                                <label class="mb-1">Adres e-mail</label>
                                <input type="text" class="form-control border-0 py-2" value="a.nowak@gmail.com">
                            </div>
                            <div class="input-wrapper mb-4">
                                <label class="mb-1">Hasło</label>
                                <input type="text" class="form-control border-0 py-2" value="123 456 789">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label fs-7" for="flexCheckDefault">
                                    Akceptuję <a href="#">Regulamin</a> i <a href="#">Politykę prywatności</a> Psia Kaloria.
                                </label>
                              </div>
                            <div class="btn-wrapper d-flex gap-4 mt-4">
                                <a href="#" class="btn btn-primary w-100">Załóż konto</a>
                            </div>
                        </form>
                        <div class="social-auth-wrapper">
                            <span class="d-block my-4 fw-light text-center fs-7">Lub kontynuuj z</span>
                            <div class="social-auth d-flex justify-content-between">
                                <a href="#">
                                    <img src="{{ asset('images/google.svg') }}" alt="">
                                </a>
                                <a href="#">
                                    <img src="{{ asset('images/apple.svg') }}" alt="">
                                </a>
                                <a href="#">
                                    <img src="{{ asset('images/facebook.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="auth-action d-flex justify-content-center mt-4">
                            <a href="{{route("login")}}">Masz już konto? Zaloguj się</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
