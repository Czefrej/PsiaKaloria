@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="title text-center mb-4 d-md-block d-block my-5">
                        <img src="{{ asset('images/smile_icon.svg') }}" alt="">
                        <h2 class="mt-5">{{__('User.confirm_your_email')}}</h2>
                        <p class="mt-4 mb-5 fw-light">{{__('User.thank_you_for_registration')}}</p>
                    </div>
                </div>
                <div class="clear-both"></div>
                <div class="col-md-4">
                    <div class="text-center">
                        <a href="#" class="text-decoration-none"><span class="d-block text-muted">{{__('User.no_mail')}}</span></a>
                    </div>
                    @if(session('status'))
                        @livewire('user-verification-form', ['waiting'=>true , 'status'=>session('status')])
                    @else
                        @livewire('user-verification-form', ['waiting'=>false])
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection

