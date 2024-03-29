@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="title text-center mb-4 d-md-block my-5">
                        <h2 class="mt-3">{{__('User.login')}}</h2>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif
                    <div class="editable-wrapper">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-wrapper mb-4">
                                <label for="email" class="mb-1">{{__('User.email')}}</label>
                                <input type="email" class="form-control border-0 py-2" id="email" name="email" value="{{old('email')}}" required autofocus autocomplete="email">
                                @if(count($errors) > 0)
                                    @foreach( $errors->all() as $message )
                                        <small class="text-primary float-end mt-1">{{$message}}</small>
                                    @endforeach
                                @endif
                            </div>
                            <div class="input-wrapper mb-4">
                                <label for="password" class="mb-1">{{__('User.password')}}</label>
                                <input id="password" name="password" type="password" class="form-control border-0 py-2" required autocomplete="current-password">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="remember_me" name="remember">
                                <label class="form-check-label fs-7" for="remember_me">
                                    {{__('User.remember_me')}}
                                </label>
                            </div>
                            <div class="btn-wrapper d-flex gap-4 mt-4">
                                <button type="submit" class="btn btn-primary w-100">{{__('User.login')}}</button>
                            </div>
                        </form>
{{--                        <div class="social-auth-wrapper">--}}
{{--                            <span class="d-block my-4 fw-light text-center fs-7">{{__('User.login_with')}}</span>--}}
{{--                            <div class="social-auth d-flex justify-content-between">--}}
{{--                                <a href="#" class="disabled">--}}
{{--                                    <img style="-webkit-filter: grayscale(1); filter: grayscale(1); opacity: 50%;" src="{{ asset('images/google.svg') }}" alt="">--}}
{{--                                </a>--}}
{{--                                <a href="#" class="disabled">--}}
{{--                                    <img style="-webkit-filter: grayscale(1); filter: grayscale(1); opacity: 50%;" src="{{ asset('images/apple.svg') }}" alt="">--}}
{{--                                </a>--}}
{{--                                <a href="#" class="disabled">--}}
{{--                                    <img style="-webkit-filter: grayscale(1); filter: grayscale(1); opacity: 50%;" src="{{ asset('images/facebook.svg') }}" alt="">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="auth-action d-flex justify-content-between mt-4">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">{{__('User.forgot_password')}}</a>
                            @endif
{{--                            <a href="{{route("register")}}">{{__('User.sign_up')}}</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
