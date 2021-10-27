@extends('layout.main')

@section('content')
    <form action="#">
        <div class="container">
            <div class="row mt-5">
                <div class="col-4">
                    <div class="progress-item active"></div>
                    <span>Twój koszyk</span>
                </div>
                <div class="col-4">
                    <div class="progress-item active"></div>
                    <span>Dostawa i płatność</span>
                </div>
                <div class="col-4">
                    <div class="progress-item"></div>
                    <span>Gotowe</span>
                </div>
            </div>
            <div class="row mt-4 mb-5">
                <div class="col-lg-8">
                    <div class="card p-4 mt-4">
                        <div class="title d-flex align-items-center">
                            <h2 class="m-0">Twoje dane</h2>
                        </div>
                        <div class="address-header d-flex justify-content-between mt-4">
                            <h5 class="m-0">Anna Nowak</h5>
                            <span class="text-primary">Zmień</span>
                        </div>
                        <p class="fw-light mt-4">
                            ul. Przykładowa 21 m 5 <br>
                            15-842 Białystok, Polska <br>
                            +48 852 456 111
                        </p>
                        <div class="checkbox-wrapper mt-2">
                            <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1" checked>
                            <label for="styled-checkbox-1">Chcę otrzymać fakture</label>
                        </div>
                        <div class="address-header d-flex justify-content-between mt-4">
                            <div class="start">
                                <span class="text-muted">Dane do faktury</span>
                                <h5 class="m-0 mt-2">Nowak Studio</h5>
                            </div>
                            <span class="text-primary">Zmień</span>
                        </div>
                        <p class="fw-light mt-4">
                            ul. Przykładowa 21 m 5 <br>
                            15-842 Białystok <br>
                            NIP: 12345678
                        </p>
                    </div>
                    <div class="card p-4 mt-4">
                        <div class="title d-flex align-items-center">
                            <h2 class="m-0">Twój koszyk</h2>
                            <span class="ms-5 text-primary fw-light">3 produkty</span>
                        </div>
                        <div class="d-md-block d-none">
                            <table class="table ">
                                <tbody>
                                    <tr>
                                        <td><img src="{{ asset('images/product_thumbnail.jpg') }}"></td>
                                        <td>Baton AS Deluxe - 85% mięsa</td>
                                        <td>Indyk</td>
                                        <td class="text-muted">2x39,90 zł</td>
                                        <td>79,80 zł</td>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ asset('images/product_thumbnail.jpg') }}"></td>
                                        <td>Baton AS Deluxe - 85% mięsa</td>
                                        <td>Indyk</td>
                                        <td class="text-muted">2x39,90 zł</td>
                                        <td>79,80 zł</td>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ asset('images/product_thumbnail.jpg') }}"></td>
                                        <td>Baton AS Deluxe - 85% mięsa</td>
                                        <td>Indyk</td>
                                        <td class="text-muted">2x39,90 zł</td>
                                        <td>79,80 zł</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-data-mobile d-md-none d-block mt-5">
                            <div class="row">
                                <div class="col">
                                    <img src="{{ asset('images/product_thumbnail.jpg') }}">
                                </div>
                                <div class="col-8 d-flex flex-column justify-content-between align-items-start">
                                    <div class="upper-text text-sm-mobile">
                                        <h5 class="fw-light mb-1">Baton AS Deluxe - 85% mięsa</h5>
                                        <span class="d-block fw-light"><small>Indyk</small></span>
                                    </div>
                                    <div class="bottom-text d-flex justify-content-between w-100 text-sm-mobile">
                                        <span class="text-muted">2x39,90 zł</span>
                                        <span class="fw-light">79,80 zł</span>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top my-4"></div>
                            <div class="row">
                                <div class="col">
                                    <img src="{{ asset('images/product_thumbnail.jpg') }}">
                                </div>
                                <div class="col-8 d-flex flex-column justify-content-between align-items-start">
                                    <div class="upper-text text-sm-mobile">
                                        <h5 class="fw-light mb-1">Baton AS Deluxe - 85% mięsa</h5>
                                        <span class="d-block fw-light"><small>Indyk</small></span>
                                    </div>
                                    <div class="bottom-text d-flex justify-content-between w-100 text-sm-mobile">
                                        <span class="text-muted">2x39,90 zł</span>
                                        <span class="fw-light">79,80 zł</span>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top my-4"></div>
                        </div>
                    </div>
                    <div class="card p-4 mt-4">
                        <div class="title d-flex align-items-center justify-content-md-start justify-content-between">
                            <h2 class="m-0">Twój koszyk</h2>
                            <span class="ms-5 text-primary fw-light">3 produkty</span>
                        </div>
                        <div class="d-md-block d-none">
                            <table class="table ">
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('images/product_thumbnail.jpg') }}">
                                            <span class="ps-3">Przelew błyskawiczny lub karta płatnicza</span>
                                        </td>
                                        <td class="text-primary fs-7">Zmień</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-md-none d-block">
                            <table class="table ">
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('images/product_thumbnail.jpg') }}">
                                        </td>
                                        <td class="text-start">Przelew błyskawiczny lub karta płatnicza</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card p-4 mt-4">
                        <div class="title d-flex align-items-center">
                            <h2 class="m-0">Dostawa</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-12">
                                <div class="delivery-list mt-4">
                                    <a href='#' class="delivery-list__item d-flex justify-content-between align-items-center">
                                        <div class="indentity-wrapper d-flex gap-md-4 gap-2 align-items-center">
                                            <img src="{{ asset('images/inpos.svg') }}" alt="">
                                            <span class="name">Paczkomaty InPost</span>
                                        </div>
                                        <div class="price-wrapper">
                                            14,99 zł
                                        </div>
                                    </a>
                                    <a href='#' class="delivery-list__item active d-flex justify-content-between align-items-center">
                                        <div class="indentity-wrapper d-flex gap-md-4 gap-2 align-items-center">
                                            <img src="{{ asset('images/inpos2.png') }}" alt="">
                                            <span class="name">Kurier Inpost</span>
                                        </div>
                                        <div class="price-wrapper">
                                            14,99 zł
                                        </div>
                                    </a>
                                    <a href='#' class="delivery-list__item d-flex justify-content-between align-items-center">
                                        <div class="indentity-wrapper d-flex gap-md-4 gap-2 align-items-center">
                                            <img src="{{ asset('images/home.svg') }}" alt="">
                                            <span class="name">Odbiór osobisty w siedzibie firmy</span>
                                        </div>
                                        <div class="price-wrapper">
                                            14,99 zł
                                        </div>
                                    </a>
                                    <a href='#' class="delivery-list__item d-flex justify-content-between align-items-center">
                                        <div class="indentity-wrapper d-flex gap-md-4 gap-2 align-items-center">
                                            <img src="{{ asset('images/dpd.png') }}" alt="">
                                            <span class="name">Kurier DPD</span>
                                        </div>
                                        <div class="price-wrapper">
                                            14,99 zł
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card p-4 mt-4 pb-4 pt-5">
                        <label class="mb-2">Informacje do zamówienia <span class="text-muted ps-2">(opcjonalnie)</span></label>
                       <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-lg-4 mt-lg-0 mt-md-4 mt-4">
                    <div class="card py-4 px-4">
                        <div class="title">
                            <h2>Podsumowanie</h2>
                        </div>
                        <div class="d-flex gap-4 mt-4 total-item">
                            <span class="text-muted">Rodzaj</span>
                            <span>jednorazowy zakup</span>
                        </div>
                        <div class="d-flex gap-4 mt-3 total-item">
                            <span class="text-muted">Wysyłka</span>
                            <span>1-2 dni robocze</span>
                        </div>
                        <div class="d-flex gap-4 mt-3 total-item">
                            <span class="text-muted">Dostawa</span>
                            <span>14,99 zł</span>
                        </div>
                        <div class="d-flex gap-4 mt-3 total-item">
                            <span class="text-muted">Koszt</span>
                            <span>79,80 zł</span>
                        </div>
                        <div class="d-flex gap-4 mt-3 total-item">
                            <span class="text-muted">Rabat</span>
                            <span class="text-primary">-19,80 zł</span>
                        </div>
                        <div class="mt-3 d-flex align-items-center">
                            <img src="{{ asset('images/Group 38537.svg') }}" alt="">
                            <span class="text-primary ps-2">Otrzymasz 45 punktów</span>
                        </div>
                        <div class="d-flex justify-content-between mt-4 align-items-center">
                            <span class="fs-5 fw-light">Łącznie do zapłaty</span>
                            <span class="fs-4 fw-bold">50 zł</span>
                        </div>

                        <button class="btn btn-success d-block mt-4">Złóż zamówienie</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
