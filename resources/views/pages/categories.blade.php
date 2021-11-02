@extends('layout.main')

@section('content')

    <section class="we-recommend categoies-page mt-md-10 mt-5 overflow-x-hidden">
        <div class="container position-relative">
            <img src="{{ asset('images/square_pattern.svg')}} " alt="" class="square-pattern-left">
            <div class="title text-center my-md-5 my-4">
                <span class="title-leading text-primary mb-2 d-block">Rodzaj karmy</span>
                <h2>Karma mokra</h2>
            </div>
            <div class="row">
                @foreach($products as $p)
                    <div class="col-md-4 col-6 mt-4">
                        <div class="product">
                                <div class="product-img-wrapper bg-white d-flex justify-content-center">
                                    <a href="{{route('product', $p->slug)}}">
                                        <img src="{{ asset($p->image) }}" width="300" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="product-description-wrapper">
                                    {{--                                <div class="product-rating-wrapper mt-3">--}}
                                    {{--                                    @renderStars(3)--}}
                                    {{--                                    <span class="ps-1 fw-lighter fs-6">(24 opinie)</span>--}}
                                    {{--                                </div>--}}
                                    <h5 class="product-title pe-md-5 mt-3"><a class="text-decoration-none text-black" href="{{route('product', $p->slug)}}">{{$p->name}}</a></h5>
                                    <div class="product-price-wrapper d-flex justify-content-end align-items-center gap-2 mt-4">
                                        <span class="product-price-discount"><del>{{$p->regular_price}} zł</del></span>
                                        <span class="product-price text-primary fw-bold">{{$p->gross_base_price}} zł</span>
                                    </div>
                                </div>
                        </div>
                    </div>
                @endforeach
{{--                <div class="col-md-4 col-6">--}}
{{--                    <div class="product">--}}
{{--                        <div class="product-img-wrapper bg-white d-flex justify-content-center">--}}
{{--                            <img src="{{ asset('images/product_img1.png') }}" alt="" class="img-fluid">--}}
{{--                        </div>--}}
{{--                        <div class="product-description-wrapper">--}}
{{--                            <div class="product-rating-wrapper mt-3">--}}
{{--                                @renderStars(3)--}}
{{--                                <span class="ps-1 fw-lighter fs-6">(24 opinie)</span>--}}
{{--                            </div>--}}
{{--                            <h5 class="product-title pe-md-5 mt-3">Baton AS Deluxe - 85% mięsa (dłuższa nazwa)</h5>--}}
{{--                            <div class="product-price-wrapper d-flex justify-content-end align-items-center gap-2 mt-4">--}}
{{--                                <span class="product-price-discount"><del>49,90 zł</del></span>--}}
{{--                                <span class="product-price text-primary fw-bold">39,90 zł</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 col-6">--}}
{{--                    <div class="product">--}}
{{--                        <div class="product-img-wrapper bg-white d-flex justify-content-center">--}}
{{--                            <img src="{{ asset('images/product_img1.png') }}" alt="" class="img-fluid">--}}
{{--                        </div>--}}
{{--                        <div class="product-description-wrapper">--}}
{{--                            <div class="product-rating-wrapper mt-3">--}}
{{--                                @renderStars(3)--}}
{{--                                <span class="ps-1 fw-lighter fs-6">(24 opinie)</span>--}}
{{--                            </div>--}}
{{--                            <h5 class="product-title pe-md-5 mt-3">BBaton AS Premium - 90% mięsa</h5>--}}
{{--                            <div class="product-price-wrapper d-flex justify-content-end align-items-center gap-2 mt-4">--}}
{{--                                <span class="product-price fw-bold">39,90 zł</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 col-6 mt-md-0 mt-4">--}}
{{--                    <div class="product">--}}
{{--                        <div class="product-img-wrapper bg-white d-flex justify-content-center">--}}
{{--                            <img src="{{ asset('images/product_img1.png') }}" alt="" class="img-fluid">--}}
{{--                        </div>--}}
{{--                        <div class="product-description-wrapper">--}}
{{--                            <div class="product-rating-wrapper mt-3">--}}
{{--                                @renderStars(43)--}}
{{--                                <span class="ps-1 fw-lighter fs-6">(24 opinie)</span>--}}
{{--                            </div>--}}
{{--                            <h5 class="product-title pe-md-5 mt-3">Baton AS Deluxe - 85% mięsa</h5>--}}
{{--                            <div class="product-price-wrapper d-flex justify-content-end align-items-center gap-2 mt-4">--}}
{{--                                <span class="product-price fw-bold">39,90 zł</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 col-6 mt-md-0 mt-4 d-md-none">--}}
{{--                    <div class="product">--}}
{{--                        <div class="product-img-wrapper bg-white d-flex justify-content-center">--}}
{{--                            <img src="{{ asset('images/product_img1.png') }}" alt="" class="img-fluid">--}}
{{--                        </div>--}}
{{--                        <div class="product-description-wrapper">--}}
{{--                            <div class="product-rating-wrapper mt-3">--}}
{{--                                @renderStars(5)--}}
{{--                                <span class="ps-1 fw-lighter fs-6">(24 opinie)</span>--}}
{{--                            </div>--}}
{{--                            <h5 class="product-title pe-md-5 mt-3">Baton AS Deluxe - 85% mięsa</h5>--}}
{{--                            <div class="product-price-wrapper d-flex justify-content-end align-items-center gap-2 mt-4">--}}
{{--                                <span class="product-price fw-bold">39,90 zł</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <img src="{{ asset('images/square_pattern.svg')}} " alt="" class="square-pattern-bottom-right">
        </div>
    </section>

@endsection
