@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="title text-center mb-4 d-md-block d-block my-5">
                        <h2 class="mt-3">Nie pamiętasz hasła?</h2>
                        <p class="my-5">Na podany adres wyślemy Ci instrukcję resetowania hasła.</p>
                    </div>
                </div>
                <div class="clear-both"></div>
                <div class="col-md-4">
                    <div class="editable-wrapper">
                        <form>
                            <div class="input-wrapper mb-4">
                                <label class="mb-1">Adres e-mail</label>
                                <input type="text" class="form-control border-0 py-2" value="a.nowak@gmail.com">
                            </div>
                            <div class="btn-wrapper d-flex gap-4 mt-4">
                                <button class="btn btn-primary w-100">Załóż konto</button>
                            </div>
                        </form>

                        <div class="auth-action d-flex justify-content-center mt-4">
                            <a href="#">Masz już konto? Zaloguj się</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
