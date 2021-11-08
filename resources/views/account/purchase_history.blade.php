@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    @include('sidebars.account_sidebar')
                </div>
                <div class="col-lg-8 position-relative">
                    <img src="{{ asset('images/square_pattern.svg') }}" alt="" class="square-pattern-top">
                    <img src="{{ asset('images/square_pattern.svg') }}" alt="" class="square-pattern-bottom">
                    <div class="title text-left mb-5 d-md-block d-none">
                        <span class="title-leading text-primary mb-2 d-block">&nbsp;</span>
                        <h2>Historia zakupów</h2>
                    </div>
                    <div class="card-wrapper">
                        <div class="card px-4 pt-md-4 pt-4 pb-4">
                            <div class="card-title d-flex justify-content-between align-items-center">
                                <div class="card-title-wrapper text-sm-mobile">
                                    <span class="text-muted">Data zamówienia</span>
                                    <h5 class="fw-light">12.08.2021, 13:14</h5>
                                </div>
                                <a href="#" class="btn btn-disabled btn-primary action" disabled>Zamów ponownie</a>
                            </div>
                            <div class="d-md-block d-none">
                                <table class="table ">
                                    <tbody>
                                        <tr>
                                            <td><img src="{{ asset('uploads/as_barf_drob_wol.jpg') }}" width="100px"></td>
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
                                        <img src="{{ asset('uploads/as_barf_drob_wol.jpg') }}" width="75px">
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
                            <div class="order-total mt-2 mb-3 d-flex justify-content-between align-items-center">
                                <div class="status-wrapper text-sm-mobile">
                                    <span class="title d-block text-muted">Status</span>
                                    <h5 class="text-orange">W trakcie realizacji</h5>
                                </div>
                                <div class="total-amout-wrapper gap-3 d-flex justify-content-center text-sm-mobile">
                                    <span class="text-muted">Razem</span>
                                    <h5 class="total-amount">159,60 zł</h5>
                                </div>
                            </div>
                            <div class="row collapse show" id="order-details-collapse-1">
                                <div class="col-12">
                                    <div class="border-top"></div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <span class="text-muted d-block fw-ligther">Numer zamówienia</span>
                                    <span class="d-block fw-lighter value-text">45489412562</span>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <span class="text-muted d-block fw-ligther">Status płatności</span>
                                    <span class="d-block fw-lighter value-text">
                                        opłacone <br>
                                        12.08.2021, 13:14
                                    </span>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <span class="text-muted d-block fw-ligther">Dostawa</span>
                                    <span class="d-block fw-lighter value-text">
                                        Kurier Inpost <br>
                                        14,30 zł
                                    </span>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <span class="text-muted d-block fw-ligther">Adres</span>
                                    <span class="d-block fw-lighter value-text">
                                        Anna Nowak <br>
                                        ul.Przykładowa 12 <br>
                                        15-544 Białystok
                                    </span>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <span class="text-muted d-block fw-ligther">Metoda płatności</span>
                                    <span class="d-block fw-lighter value-text">
                                        Przelew błyskawiczny lub <br>
                                        karta płatnicza
                                    </span>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <span class="text-muted d-block fw-ligther">Dostawa</span>
                                    <span class="d-block fw-lighter value-text">
                                        Kurier Inpost<br>
                                        darmowa
                                    </span>
                                </div>
                            </div>
                            <div class="bottom-actions mt-3 d-flex justify-content-end">
                                <a href="#order-details-collapse-1" data-bs-toggle="collapse" href="#order-details-collapse-1" role="button" aria-expanded="true" aria-controls="order-details-collapse-1" class="collapse-btn text-muted text-decoration-none align-middle gap-2 d-flex">
                                   <span class="hide">
                                        <img src="{{ asset('images/arrow_up_icon.svg') }}">
                                        Zwiń
                                   </span>
                                   <span class="show">
                                        <img src="{{ asset('images/arrow_down_icon.svg') }}">
                                        Rozwiń
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrapper mt-3">
                        <div class="card px-4 pt-md-4 pt-4 pb-4">
                            <div class="card-title d-flex justify-content-between align-items-center">
                                <div class="card-title-wrapper text-sm-mobile">
                                    <span class="text-muted">Data zamówienia</span>
                                    <h5 class="fw-light">12.08.2021, 10:33</h5>
                                </div>
                                <a href="#" class="btn btn-primary action">Zamów ponownie</a>
                            </div>
                            <div class="d-md-block d-none">
                                <table class="table">
                                    <tbody>
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
                            </div>
                            <div class="order-total mt-3 mb-3 d-flex justify-content-between align-items-center">
                                <div class="status-wrapper text-sm-mobile">
                                    <span class="title d-block text-muted">Status</span>
                                    <h5 class="text-success">W trakcie realizacji</h5>
                                </div>
                                <div class="total-amout-wrapper gap-3 d-flex justify-content-center text-sm-mobile">
                                    <span class="text-muted">Razem</span>
                                    <h5 class="total-amount">159,60 zł</h5>
                                </div>
                            </div>

                            <div class="row collapse" id="order-details-collapse">
                                <div class="col-12">
                                    <div class="border-top"></div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <span class="text-muted d-block fw-ligther">Numer zamówienia</span>
                                    <span class="d-block fw-lighter value-text">45489412562</span>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <span class="text-muted d-block fw-ligther">Status płatności</span>
                                    <span class="d-block fw-lighter value-text">
                                        opłacone <br>
                                        12.08.2021, 13:14
                                    </span>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <span class="text-muted d-block fw-ligther">Dostawa</span>
                                    <span class="d-block fw-lighter value-text">
                                        Kurier Inpost <br>
                                        14,30 zł
                                    </span>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <span class="text-muted d-block fw-ligther">Adres</span>
                                    <span class="d-block fw-lighter value-text">
                                        Anna Nowak <br>
                                        ul.Przykładowa 12 <br>
                                        15-544 Białystok
                                    </span>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <span class="text-muted d-block fw-ligther">Metoda płatności</span>
                                    <span class="d-block fw-lighter value-text">
                                        Przelew błyskawiczny lub <br>
                                        karta płatnicza
                                    </span>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <span class="text-muted d-block fw-ligther">Dostawa</span>
                                    <span class="d-block fw-lighter value-text">
                                        Kurier Inpost<br>
                                        darmowa
                                    </span>
                                </div>
                            </div>
                            <div class="bottom-actions mt-3 d-flex justify-content-end">
                                <a href="#order-details-collapse" data-bs-toggle="collapse" href="#order-details-collapse" role="button" aria-expanded="false" aria-controls="order-details-collapse" class="collapse-btn text-muted text-decoration-none align-middle gap-2 d-flex">
                                   <span class="hide">
                                        <img src="{{ asset('images/arrow_up_icon.svg') }}">
                                        Zwiń
                                   </span>
                                   <span class="show">
                                        <img src="{{ asset('images/arrow_down_icon.svg') }}">
                                        Rozwiń
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="pagination-wrapper mt-5">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-end">
                              <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">...</a></li>
                              <li class="page-item"><a class="page-link" href="#">5</a></li>
                              <li class="page-item"><a class="page-link" href="#">6</a></li>
                              <li class="page-item">
                                <a class="page-link next" href="#"> <img src="{{ asset('images/arrow_right_icon.svg') }}"> </a>
                              </li>
                            </ul>
                          </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
