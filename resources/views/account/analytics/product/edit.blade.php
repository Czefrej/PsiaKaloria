@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    @include('sidebars.account_sidebar')
                </div>
                <div class="col-lg-6">
                    <div class="title text-left mb-4 d-md-block">
                        <span class="title-leading text-primary mb-2 d-block">&nbsp;</span>
                        <a href="{{route('account.analytics.product.index')}}" class="text-decoration-none"><img src="{{ asset('images/back_arrow_icon.svg') }}"> <small class="ms-1 text-muted">Wróć do listy produktów</small></a>
                        <h2 class="mt-3">Edytuj produkt {{$product->sku}}</h2>

                    </div>
                    @livewire('analytics.product.edit',['product' => $product])

                    @livewire('analytics.product.destroy',['product' => $product])

                </div>
            </div>
        </div>
    </div>

@endsection
