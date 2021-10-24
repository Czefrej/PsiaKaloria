@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="title text-center mb-4 d-md-block my-5">
                        <h2 class="mt-3">{{__('User.register')}}</h2>
                    </div>
                    <div class="editable-wrapper">
                        <form method="POST" action="{{route('register')}}">
                            @csrf
                            <div class="input-wrapper mb-4">
                                <label class="mb-1" for="email">{{__('User.email')}}</label>
                                <input type="email" id="email" name="email" class="form-control border-0 py-2" value="{{old('email')}}" autocomplete="email" required autofocus>
                                @if(count($errors) > 0)
                                    @foreach( $errors->all() as $message )
                                        <small class="text-primary float-end mt-1">{{$message}}</small>
                                    @endforeach
                                @endif
                            </div>
                            <div class="input-wrapper mb-4">
                                <label class="mb-1" for="password">{{__('User.password')}}</label>
                                <input type="password" id="password" name="password" class="form-control border-0 py-2" autocomplete="new-password" required>
                            </div>
                            <div class="input-wrapper mb-4">
                                <label class="mb-1" for="password_confirmation">{{__('User.password_confirmation')}}</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control border-0 py-2" required>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="agreement" required name="agreement">
                                <label class="form-check-label fs-7" for="agreement">
                                    {!!__('User.agreement')!!}
                                </label>
                            </div>
                            <div class="btn-wrapper d-flex gap-4 mt-4">
                                <button type="submit" class="btn btn-primary w-100">{{__('User.register')}}</button>
                            </div>
                        </form>
                        <div class="social-auth-wrapper">
                            <span class="d-block my-4 fw-light text-center fs-7">{{__('User.login_with')}}</span>
                            <div class="social-auth d-flex justify-content-between">
                                <a href="#" class="disabled">
                                    <img style="-webkit-filter: grayscale(1); filter: grayscale(1); opacity: 50%;" src="{{ asset('images/google.svg') }}" alt="">
                                </a>
                                <a href="#" class="disabled">
                                    <img style="-webkit-filter: grayscale(1); filter: grayscale(1); opacity: 50%;" src="{{ asset('images/apple.svg') }}" alt="">
                                </a>
                                <a href="#" class="disabled">
                                    <img style="-webkit-filter: grayscale(1); filter: grayscale(1); opacity: 50%;" src="{{ asset('images/facebook.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="auth-action d-flex justify-content-center mt-4">
                            <a href="{{route("login")}}">{{__('User.already_have_an_account')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
