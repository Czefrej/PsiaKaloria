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
                        <h2>Moje subskrypcje</h2>
                    </div>
                    <div class="card-wrapper">
                        <div class="card px-4 pt-md-4 pt-4 pb-4">
                            <div class="card-title d-flex justify-content-between align-items-center">
                                <div class="card-title-wrapper text-sm-mobile">
                                    <span class="text-muted">Następna płatność</span>
                                    <h5 class="fw-light">12.08.2021</h5>
                                </div>
                                <a href="#" class="btn btn-primary action" data-bs-toggle="modal" data-bs-target="#exampleModal">Anuluj subskrypcje</a>
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
                            <div class="order-total mt-2 mb-3 d-flex justify-content-between align-items-center">
                                <div class="status-wrapper text-sm-mobile">
                                    <span class="title d-block text-muted">Status</span>
                                    <h5 class="text-primary">Do opłacenia</h5>
                                </div>
                                <div class="total-amout-wrapper gap-3 d-flex justify-content-center text-sm-mobile">
                                    <span class="text-muted">Razem</span>
                                    <h5 class="total-amount">
                                        159,60 zł
                                        <span class="text-primary d-block fs-6 text-end"><small>/co 7 dni</small></span>
                                    </h5>
                                </div>
                            </div>
                            <div class="border-top"></div>
                            <div class="row mt-4">
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
                                <a href="#" class="text-muted text-decoration-none align-middle gap-2 d-flex">
                                    <img src="{{ asset('images/arrow_up_icon.svg') }}">
                                    Zwiń
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrapper mt-3">
                        <div class="card px-4 pt-md-4 pt-4 pb-4">
                            <div class="card-title d-flex justify-content-between align-items-center">
                                <div class="card-title-wrapper text-sm-mobile">
                                    <span class="text-muted">Następna płatność</span>
                                    <h5 class="fw-light">12.08.2021</h5>
                                </div>
                                <a href="#" class="btn btn-primary-light action">Zamów ponownie</a>
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
                                    <h5 class="total-amount">
                                        159,60 zł
                                        <span class="text-primary d-block fs-6 text-end"><small>/co 7 dni</small></span>
                                    </h5>
                                </div>
                            </div>

                            <div class="bottom-actions mt-3 d-flex justify-content-end">
                                <a href="#" class="text-muted text-decoration-none align-middle gap-2 d-flex">
                                    <img src="{{ asset('images/arrow_down_icon.svg') }}">
                                    Rozwiń
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center py-5 px-4">
                <h5>Opuszczasz nas?</h5>
                <p class="mt-4 fw-light">Pamiętaj jeżeli usuniesz konto, stracisz wszystkie dane o historii zamówień oraz swoich subskrypcjach.</p>
                <div class="btns mt-4 d-flex gap-3 justify-content-center">
                    <a href="#" class="btn btn-primary-light" data-bs-dismiss="modal">Usuwam konto</a>
                    <a href="#" class="btn btn-primary" data-bs-dismiss="modal">Anuluj</a>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
