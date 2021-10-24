@extends('layout.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-10 mb-md-5 mt-m-5">
            <div class="col-lg-8">
                <div class="product-imgs-wrapper">
                    <div class="product-thumbnails">
                        <a href='#' class="product-thumbnail-item">
                            <img src="{{ asset('images/product_thumbnail_trans.png') }}" alt="">
                        </a>
                        <a href='#' class="product-thumbnail-item">
                            <img src="{{ asset('images/product_thumbnail_trans.png') }}" alt="">
                        </a>
                        <a href='#' class="product-thumbnail-item">
                            <img src="{{ asset('images/product_thumbnail_trans.png') }}" alt="">
                        </a>
                    </div>
                    <div class="main-product-img-wrapper">
                        <img src="{{ asset('images/main_product.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-details mt-lg-0 mt-4">
                    <h5>Baton AS Deluxe - 85% mięsa</h5>
                    <div class="product-rating-wrapper mt-2">
                        @renderStars(4)
                        <span class="ps-1 fw-lighter fs-6">(24 opinie)</span>
                    </div>
                    <div class="product-price-wrapper d-flex d-md-none justify-content-end align-items-end flex-column gap-2 mt-4">
                        <div class="product-price">
                            <span class="product-price-discount"><del>49,90 zł</del></span>
                            <span class="product-price text-primary fw-bold">39,90 zł</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="d-block title mb-4 text-muted">Smak</span>
                        <div class="d-flex gap-3 align-items-center flex-wrap">
                            <a href="#" class="btn btn-gray-outline px-4">jagnięcina</a>
                            <a href="#" class="btn btn-gray-outline px-4">jagnięcina i wołowina</a>
                            <a href="#" class="btn btn-primary-outline px-4">Indyk</a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="quantity">
                            <span class="d-block title mt-4 mb-3 text-muted">Ilość</span>
                            <div class="cart-quantity-counter">
                                <button>-</button>
                                <input type="text" value="1" class="bg-transparent">
                                <button>+</button>
                            </div>
                        </div>
                        <div class="product-price-wrapper d-none d-md-flex justify-content-end align-items-end flex-column gap-2 mt-4">
                            <span class="title fw-lighter mb-2">Koszt</span>
                            <div class="product-price">
                                <span class="product-price-discount"><del>49,90 zł</del></span>
                                <span class="product-price text-primary fw-bold">39,90 zł</span>
                            </div>
                        </div>
                    </div>
                    <span class="text-primary fw-light d-none d-md-block mt-2">*dodaj jeszcze 2 szt. aby otrzymać rabat</span>

                    <div class="add-to-cart-wrapper mt-4">
                        <a href="#" class="btn btn-success d-block">Dodaj do koszyka</a>
                    </div>

                    <span class="text fs-7 fw-lighter mt-md-2 mt-4 mb-4 mb-md-0 d-block">
                        <img src="{{ asset('images/truck.svg') }}" alt="">
                        Dostępny w magazynie - Dostawa w w ciągu 1-2 dni
                    </span>
                </div>
            </div>
        </div>
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
        <div class="row mt-md-5 mt-3 justify-content-between">
            <div class="col-lg-5">
                <h5 class="mb-md-5 mb-3">Opis</h5>
                <p class="fw-light">
                    Karma AS Deluxe to pełnoporcjowa i pełnowartościowa karma mokra z indykiem dla psów i kotów. Wysoka zawartość mięsa w karmie, zapewnia prawidłowy rozwój i wspomaga procesy biologiczne Twojego pupila. Dzięki wysokiej jakości mięsa i surowców pochodzenia mięsnego (aż 85%), karma jest idealnym i naturalnym źródłem wysokostrawnego białka.
                </p>
                <p class="fw-light mt-5">
                    Nasza karma zdobyła uznanie wśród hodowców i miłośników psów z którymi nieustannie współpracujemy. Według naszych klientów zmiana karmy na AS Premium, poprawiła jakość odchodów i kondycję układu trawiennego. A jak ją wcinają!
                </p>
            </div>
            <div class="col-lg-6">
                <h5 class="mb-md-5 mb-4 mt-md-0 mt-4">Wartośći odżywcze</h5>
                <div class="product-nutritions">
                    <div class="product-nutritions__item d-flex justify-content-between px-3 py-3">
                        <span class="fw-light">Białko surowe</span>
                        <span class="fw-bold">17.6%</span>
                    </div>
                    <div class="product-nutritions__item d-flex justify-content-between px-3 py-3">
                        <span class="fw-light">Oleje i tłuszcze surowe</span>
                        <span class="fw-bold">9.3%</span>
                    </div>
                    <div class="product-nutritions__item d-flex justify-content-between px-3 py-3">
                        <span class="fw-light">Popiół surowy</span>
                        <span class="fw-bold">6%</span>
                    </div>
                    <div class="product-nutritions__item d-flex justify-content-between px-3 py-3">
                        <span class="fw-light">Włókno surowe</span>
                        <span class="fw-bold">0.2%</span>
                    </div>
                    <div class="product-nutritions__item d-flex justify-content-between px-3 py-3">
                        <span class="fw-light">Wilgotność</span>
                        <span class="fw-bold">67.9%</span>
                    </div>
                </div>
            </div>
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
                            <span class="d-block fw-bold fs-5">0.3</span>
                            <span class="text-muted d-block">batona</span>
                        </div>
                    </div>
                    <div class="daily-usage__item d-flex justify-content-center">
                        <div class="desc-wrapper text-center pb-md-5 pb-3 flex-grow-1 d-flex justify-content-end align-items-center flex-column">
                            <img src="{{ asset('images/dog2.svg') }}" alt="">
                            <span class="fw-bold d-block mt-3">20 kg</span>
                        </div>
                        <div class="quantity text-center d-flex align-items-center flex-column justify-content-center">
                            <span class="d-block fw-bold fs-5">0.5</span>
                            <span class="text-muted d-block">batona</span>
                        </div>
                    </div>
                    <div class="daily-usage__item d-flex justify-content-center">
                        <div class="desc-wrapper text-center pb-md-5 pb-3 flex-grow-1 d-flex justify-content-end align-items-center flex-column">
                            <img src="{{ asset('images/dog3.svg') }}" alt="">
                            <span class="fw-bold d-block mt-3">30 kg</span>
                        </div>
                        <div class="quantity text-center d-flex align-items-center flex-column justify-content-center">
                            <span class="d-block fw-bold fs-5">0.75</span>
                            <span class="text-muted d-block">batona</span>
                        </div>
                    </div>
                    <div class="daily-usage__item d-flex justify-content-center">
                        <div class="desc-wrapper text-center pb-md-5 pb-3 flex-grow-1 d-flex justify-content-end align-items-center flex-column">
                            <img src="{{ asset('images/dog2.svg') }}" alt="">
                            <span class="fw-bold d-block mt-3">40 kg</span>
                        </div>
                        <div class="quantity text-center d-flex align-items-center flex-column justify-content-center">
                            <span class="d-block fw-bold fs-5">1</span>
                            <span class="text-muted d-block">batona</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
