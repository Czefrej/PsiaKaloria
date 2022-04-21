@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    @include('sidebars.account_sidebar')
                </div>
                <div class="col-lg-8 position-relative pb-5">
                    <img src="{{ asset('images/square_pattern.svg') }}" alt="" class="square-pattern-top">
                    <img src="{{ asset('images/square_pattern.svg') }}" alt="" class="square-pattern-bottom">
                    <div class="title text-left mb-5 d-md-block d-none">
                        <span class="title-leading text-primary mb-2 d-block">&nbsp;</span>
                        <h2>{{__('User.settings')}}</h2>
                    </div>
                    <div class="card-wrapper">
                        <div class="card px-4 pt-md-5 pt-4 pb-4">
                            <div class="card-title d-flex justify-content-between">
                                <h5>{{__('User.personal_data')}}</h5>
                            </div>
                            <div class="row mt-6">
                                <div class="col-md-6 mb-md-0 mb-6">
                                    <span class="text-muted d-block fw-ligther">{{__('User.account_name')}}</span>
                                    <span class="d-block fw-lighter value-text">{{Auth::user()->name}}</span>
                                </div>
                                <div class="col-md-6 mb-md-0 mb-6">
                                    <span class="text-muted d-block fw-ligther">{{__('User.email')}}</span>
                                    <span class="d-block fw-lighter value-text">{{Auth::user()->email}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    @if(Auth::user()->role == "shelter")--}}
{{--                        <div class="card-wrapper mt-3">--}}
{{--                            <div class="card px-4 pt-md-5 pt-4 pb-4">--}}
{{--                                <div class="card-title d-flex justify-content-between">--}}
{{--                                    <h5>{{__('Shelter.shelters')}}</h5>--}}
{{--                                </div>--}}
{{--                                <div class="row mt-3">--}}
{{--                                    <div class="col-md-4 mb-md-0 mb-4">--}}
{{--                                        <h5><center>Schronisko nad czerwonym pelikanem - Warszawa</center></h5>--}}
{{--                                        <span class="d-block fw-lighter value-text mt-3">--}}
{{--                                            <center>--}}
{{--                                                ul. Przykładowa 21 m 5 <br>--}}
{{--                                        15-842 Białystok, Polska <br>--}}
{{--                                        +48 852 456 111--}}
{{--                                            </center>--}}

{{--                                    </span>--}}
{{--                                        <div class="actions d-flex gap-4 mt-3">--}}
{{--                                            <a href="#" class="text-decoration-none"><span class="text-primary fw-light">{{__('Shelter.edit')}}</span></a>--}}
{{--                                            <a href="#" class="text-decoration-none"><span class="text-primary fw-light">{{__('User.delete')}}</span></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    <div class="card-wrapper mt-3">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="card px-4 pt-md-5 pt-4 pb-4">--}}
{{--                                    <div class="card-title d-flex justify-content-between">--}}
{{--                                        <h5>{{__('User.password')}}</h5>--}}
{{--                                    </div>--}}
{{--                                    <div class="action">--}}
{{--                                        <a href="{{route('account.password')}}" class="btn btn-primary d-md-inline-block d-block">--}}
{{--                                            {{__('User.change_password')}}--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="card px-4 pt-md-5 pt-4 pb-4 mt-md-0 mt-3">--}}
{{--                                    <div class="card-title d-flex justify-content-between">--}}
{{--                                        <h5>{{__('User.account')}}</h5>--}}
{{--                                    </div>--}}
{{--                                    <div class="action">--}}
{{--                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary d-md-inline-block d-block">--}}
{{--                                            {{__('User.delete_account')}}--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
{{--    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-body text-center py-5 px-4">--}}
{{--                <h5>Opuszczasz nas?</h5>--}}
{{--                <p class="mt-4 fw-light">Pamiętaj jeżeli usuniesz konto, stracisz wszystkie dane o historii zamówień oraz swoich subskrypcjach.</p>--}}
{{--                <div class="btns mt-4 d-flex gap-3 justify-content-center">--}}
{{--                    <a href="#" class="btn btn-primary-light" data-bs-dismiss="modal">Usuwam konto</a>--}}
{{--                    <a href="#" class="btn btn-primary" data-bs-dismiss="modal">Anuluj</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
