@extends('layout.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-10 mb-md-5 mt-m-5">
            <!-- Modal -->
            @livewire('added-to-cart-modal', ['product' => $product])

{{--            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                <div class="modal-dialog" role="document">--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-header">--}}
{{--                            <h5 class="modal-title" id="exampleModalLabel">Dodano do koszyka</h5>--}}
{{--                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body">--}}
{{--                            <div class="cart-items">--}}
{{--                                --}}{{-- Desktop version --}}
{{--                                <div class="cart-item desktop d-flex align-items-center justify-content-between">--}}
{{--                                    <div class="product-details d-flex align-items-center">--}}
{{--                                        <div class="img-wrapper">--}}
{{--                                            <img src="{{ asset('images/product_thumbnail.jpg') }}" alt="">--}}
{{--                                        </div>--}}
{{--                                        <div class="title-wrapper ms-4 fw-light">--}}
{{--                                            <span class="d-block">Baton AS Deluxe</span>--}}
{{--                                            <span class="d-block">- 85% mięsa</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="ms-5 fw-light">--}}
{{--                                        <span>Indyk</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="cart-quantity-counter ms-5">--}}
{{--                                        <button>-</button>--}}
{{--                                        <input type="text" value="1">--}}
{{--                                        <button>+</button>--}}
{{--                                    </div>--}}
{{--                                    <div class="ms-5 text-end d-flex align-items-center">--}}
{{--                                        <div class="fw-light">--}}
{{--                                            <span class="d-block">79,80 zł</span>--}}
{{--                                            <span class="text-muted d-block">za sztukę 79,80 zł</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                --}}{{-- Mobile version --}}
{{--                                <div class="cart-item mobile d-flex align-items-center justify-content-between">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="product-details d-flex align-items-center flex-grow-1">--}}
{{--                                            <div class="img-wrapper">--}}
{{--                                                <img src="{{ asset('images/product_thumbnail.jpg') }}" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="title-wrapper ms-4 fw-light">--}}
{{--                                                <span class="d-block"><b id="mobile-qty">2x</b>  {{$product->name}}</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex justify-content-end mt-3">--}}
{{--                                        <div class="ms-3 text-end d-flex align-items-center">--}}
{{--                                            <div class="fw-light">--}}
{{--                                                <span class="d-block">79,80 zł</span>--}}
{{--                                                <span class="text-muted d-block">za sztukę {{$product->getPrice()}} zł</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kontynuuj zakupy</button>--}}
{{--                            <a href="{{route('cart')}}" type="button" class="btn btn-primary">Przejdź do koszyka</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- Modal -->

            <div class="col-lg-8">
                <div class="product-imgs-wrapper">
                    <div class="product-thumbnails">
                        <a href='#' class="product-thumbnail-item">
                            <img src="{{ asset('images/product_thumbnail_trans.png') }}" alt="">
                        </a>
{{--                        <a href='#' class="product-thumbnail-item">--}}
{{--                            <img src="{{ asset('images/product_thumbnail_trans.png') }}" alt="">--}}
{{--                        </a>--}}
{{--                        <a href='#' class="product-thumbnail-item">--}}
{{--                            <img src="{{ asset('images/product_thumbnail_trans.png') }}" alt="">--}}
{{--                        </a>--}}
                    </div>
                    <div class="main-product-img-wrapper">
                        <img src="{{ asset($product->image) }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-details mt-lg-0 mt-4">
                    <h5>{{$product->name}}</h5>
{{--                    <div class="product-rating-wrapper mt-2">--}}
{{--                        @renderStars(4)--}}
{{--                        <span class="ps-1 fw-lighter fs-6">(24 opinie)</span>--}}
{{--                    </div>--}}
                    <div class="product-price-wrapper d-flex d-md-none justify-content-end align-items-end flex-column gap-2 mt-4">
                        <div class="product-price">
                            <span class="product-price-discount"><del>49,90 zł</del></span>
                            <span class="product-price text-primary fw-bold">{{$product->gross_base_price}} zł</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="d-block title mb-4 text-muted">Smak</span>
                        <div class="d-flex gap-3 align-items-center flex-wrap">
                            @foreach($product->getVariants() as $v)
                                <a href="@if($v->variant == $product->variant)#@else/product/{{$v->slug}}@endif" class="btn @if($v->variant == $product->variant) btn-primary-outline @else btn-gray-outline @endif px-4">{{$v->variant}}</a>
                            @endforeach

                        </div>
                    </div>
                    @livewire('add-to-cart', ['product' => $product])

                    <span class="text fs-7 fw-lighter mt-md-2 mt-4 mb-4 mb-md-0 d-block">
                        <img src="{{ asset('images/truck.svg') }}" alt="">
                        Dostępny w magazynie - Dostawa w @estDeliveryDate(true)
                    </span>
                </div>
            </div>
        </div>
        @switch($product->brand)
            @case('AS BARF')
            <div class="row mt-10 mt-m-0">
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/meat.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Odpowiednia dla diety BARF</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/wheat.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Naturalne składniki</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/snow.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">
                            Dociera zamrożona do <br> klienta
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/fresh.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Gwarancja świeżości</div>
                    </div>
                </div>
            </div>
            @break
            @case('AS Deluxe')
            <div class="row mt-10 mt-m-0">
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/birds.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">85% mięsa</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/wheat.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Naturalne składniki</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/temp.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">
                            Temperatura <br>
                            przechowywania do 25°C
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/flag.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Produkt Polski</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/tube.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">
                            Bez konserwantów i<br>
                            aromatów
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/chicken.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Przyjemny zapach</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/badge.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Doceniana przez hodowców</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/candies.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Łatwe dawkowanie</div>
                    </div>
                </div>
            </div>
            @break
            @case('AS Premium')
            <div class="row mt-10 mt-m-0">
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/birds.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">85% mięsa</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/wheat.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Naturalne składniki</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/temp.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">
                            Temperatura <br>
                            przechowywania do 25°C
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/flag.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Produkt Polski</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/tube.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">
                            Bez konserwantów i<br>
                            aromatów
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/chicken.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Przyjemny zapach</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/badge.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Doceniana przez hodowców</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/candies.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Łatwe dawkowanie</div>
                    </div>
                </div>
            </div>
            @break
            @case('CarniMeal')
            <div class="row mt-10 mt-m-0">
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/birds.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">85% mięsa</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/wheat.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Naturalne składniki</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/temp.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">
                            Temperatura <br>
                            przechowywania do 25°C
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/flag.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Produkt Polski</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/tube.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">
                            Bez konserwantów i<br>
                            aromatów
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/chicken.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Przyjemny zapach</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/badge.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Doceniana przez hodowców</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="feature-item">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/candies.svg') }}" alt="">
                        </div>
                        <div class="name-wrapper">Łatwe dawkowanie</div>
                    </div>
                </div>
            </div>
            @break
        @endswitch
        <div class="row mt-md-5 mt-3 justify-content-between">
            {!! $product->description !!}
        </div>
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <h5>Sugerowane dawkowanie dzienne</h5>
                <div class="daily-usage mt-5 d-flex">
                    <div class="daily-usage__item d-flex justify-content-center">
                        <div class="desc-wrapper text-center pb-md-5 pb-3 flex-grow-1 d-flex justify-content-end align-items-center flex-column">
                            <img src="{{ asset('images/dog1.svg') }}" alt="">
                            <span class="fw-bold d-block mt-3">10 kg</span>
                        </div>
                        <div class="quantity text-center d-flex align-items-center flex-column justify-content-center">
                            <span class="d-block fw-bold fs-5">@if($product->category == 'frozen_food') 2 @else 0,3 @endif</span>
                            <span class="text-muted d-block">@if($product->category == 'frozen_food') kostki @else batona @endif</span>
                        </div>
                    </div>
                    <div class="daily-usage__item d-flex justify-content-center">
                        <div class="desc-wrapper text-center pb-md-5 pb-3 flex-grow-1 d-flex justify-content-end align-items-center flex-column">
                            <img src="{{ asset('images/dog2.svg') }}" alt="">
                            <span class="fw-bold d-block mt-3">20 kg</span>
                        </div>
                        <div class="quantity text-center d-flex align-items-center flex-column justify-content-center">
                            <span class="d-block fw-bold fs-5">@if($product->category == 'frozen_food') 3 @else 0,5 @endif</span>
                            <span class="text-muted d-block">@if($product->category == 'frozen_food') kostki @else batona @endif</span>
                        </div>
                    </div>
                    <div class="daily-usage__item d-flex justify-content-center">
                        <div class="desc-wrapper text-center pb-md-5 pb-3 flex-grow-1 d-flex justify-content-end align-items-center flex-column">
                            <img src="{{ asset('images/dog3.svg') }}" alt="">
                            <span class="fw-bold d-block mt-3">30 kg</span>
                        </div>
                        <div class="quantity text-center d-flex align-items-center flex-column justify-content-center">
                            <span class="d-block fw-bold fs-5">@if($product->category == 'frozen_food') 4 @else 0,75 @endif</span>
                            <span class="text-muted d-block">@if($product->category == 'frozen_food') kostki @else batona @endif</span>
                        </div>
                    </div>
                    <div class="daily-usage__item d-flex justify-content-center">
                        <div class="desc-wrapper text-center pb-md-5 pb-3 flex-grow-1 d-flex justify-content-end align-items-center flex-column">
                            <img src="{{ asset('images/dog2.svg') }}" alt="">
                            <span class="fw-bold d-block mt-3">40 kg</span>
                        </div>
                        <div class="quantity text-center d-flex align-items-center flex-column justify-content-center">
                            <span class="d-block fw-bold fs-5">@if($product->category == 'frozen_food') 5 @else 1 @endif</span>
                            <span class="text-muted d-block">@if($product->category == 'frozen_food') kostki @else batona @endif</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

