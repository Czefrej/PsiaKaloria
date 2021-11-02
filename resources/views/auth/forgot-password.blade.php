@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="title text-center mb-4 d-md-block d-block my-5">
                        <h2 class="mt-3">{{__('User.forgot_password')}}</h2>
                        <p class="my-5">{{__('User.we_will_send_you_instructions')}}</p>
                    </div>
                </div>
                <div class="clear-both"></div>
                <div class="col-md-4">
                    @if(session('status'))
                        @livewire('password-forgotten-form', ['old_email'=>old('email'), 'waiting'=>true , 'status'=>session('status')])
                    @else
                        @if(count($errors) > 0)
                            @livewire('password-forgotten-form', ['old_email'=>old('email'), 'waiting'=>false, 'errors'=>$errors->all()])
                        @else
                            @livewire('password-forgotten-form', ['old_email'=>old('email'), 'waiting'=>false, 'errors'=>[]])
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
