@extends('layout.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title text-left mb-3 mt-5 d-flex gap-2 align-items-center">
                    <h2 class="m-0">Twój koszyk</h2> <span class="text-primary">3 produkty</span>
                </div>
            </div>
            <div class="col-12 mt-4 d-md-block d-none">
                <div class="bg-gray">Do darmowej dostawy brakuje ci 110 zł</div>
            </div>
            <div class="col-lg-8 mt-4">
                <div class="card p-4">
                    <div class="cart-items">
                        @include('sections.cart.cart_item')
                        <div class="w-100 text-end mt-1">
                            <span class="text-primary fw-light">*dodaj 2 szt. aby otrzymać rabat</span>
                        </div>
                        <div class="cart-items-separator mt-2"></div>
                        @include('sections.cart.cart_item')
                        <div class="cart-items-separator"></div>
                        @include('sections.cart.cart_item')
                        <div class="cart-items-separator"></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center flex-md-row flex-column flex-wrap">
                        <div class="discount-apply">
                            <label>Kod rabatowy</label>
                            <div class="d-flex align-items-center gap-4 justify-content-start">
                                <input type="text" class="form-control border-0">
                                <button class="btn btn-primary">Wykorzystaj kod</button>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mt-4 align-items-center">
                            <span>Płać punktami</span>
                            <div class="flipswitch">
                                <input type="checkbox" name="flipswitch" class="flipswitch-cb" id="fs" checked>
                                <label class="flipswitch-label" for="fs">
                                    <div class="flipswitch-inner"></div>
                                    <div class="flipswitch-switch"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mt-4 pt-5 px-4 pb-4">
                    <h2>Podsumowanie</h2>
                    <span class="d-block text-muted mt-3">Rodzaj</span>
                    <div class="btn-group d-flex gap-4 mt-3 flex-wrap">
                        <a href="#" class="btn btn-primary-outline">jednorozowy zakup</a>
                        <a href="#" class="btn btn-gray-outline">subskrypcja</a>
                    </div>
                    <table class="mt-3 cart-table">
                        <tr>
                            <td class="text-muted py-2">Wysyłka</td>
                            <td class="text-start py-2">1-2 dni robocze</td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">Dostawa</td>
                            <td class="text-start py-2">w następnym kroku</td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">Koszt</td>
                            <td class="text-start py-2">79,80 zł</td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">Rabat</td>
                            <td class="text-start py-2 text-primary">-79,80 zł</td>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-between mt-3">
                        <span class="pt-2">Łącznie do zapłaty</span>
                        <span class="text-end fw-bolder fs-3">
                            50 zł
                            <span class="text-muted d-block">+ dostawa</span>
                        </span>
                    </div>
                    <div class="btns">
                        <a href="#" class="btn btn-success d-block mt-4">Złóż zamówienie</a>
                        <a href="#" class="btn btn-warning d-block mt-4">Zamów do schroniska</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    @include('sections.home_page.recommended_products')

@endsection
