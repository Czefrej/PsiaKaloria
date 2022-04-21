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
                        <h2 class="mt-3">Dodaj użytkownika</h2>
                    </div>
                    @livewire('user.create')
                </div>
            </div>
        </div>
    </div>

@endsection
