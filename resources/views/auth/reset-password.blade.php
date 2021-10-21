@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="title text-center mb-4 d-md-block d-block my-5">
                        <h2 class="mt-3">Zmień swoje hasło.</h2>
                        <p class="my-5">Poniżej wpisz swoje nowe hasło.</p>
                    </div>
                </div>
                <div class="clear-both"></div>
                <div class="col-md-4">
                    <div class="editable-wrapper">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="input-wrapper mb-4">
                                <label class="mb-1" for="email">Adres e-mail</label>
                                <input type="email" id="email" name="email" class="form-control border-0 py-2"  value="{{old('email', $request->email)}}" required autofocus>
                                @if(count($errors) > 0)
                                    @foreach( $errors->all() as $message )
                                        <small class="text-primary float-end mt-1">{{$message}}</small>
                                    @endforeach
                                @endif
                            </div>

                            <div class="input-wrapper mb-4">
                                <label for="password" class="mb-1">Nowe hasło</label>
                                <input id="password" name="password" type="password" class="form-control border-0 py-2" required>
                            </div>
                            <div class="input-wrapper mb-4">
                                <label for="password" class="mb-1">Potwierdź nowe hasło</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control border-0 py-2" required>
                            </div>
                            <div class="btn-wrapper d-flex gap-4 mt-4">
                                <button type="submit" class="btn btn-primary w-100">Zmień hasło</button>
                            </div>
                        </form>

                        <div class="auth-action d-flex justify-content-center mt-4">
                            <a href="{{route('login')}}">Masz już konto? Zaloguj się</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
