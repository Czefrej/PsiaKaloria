@extends('layout.main')

@section('content')

    <!-- Section returns and complaints start -->
    <section class="returns-and-complaints">

        <div class="container">
            <div class="row">
                <div class="col-12 d-md-block d-none">
                    <div class="title text-left mb-3 mt-5">
                        <h2>&nbsp;</h2>
                    </div>
                </div>
                <div class="col-12 mb-4 mt-md-2 mt-4">
                    <div class="card">
                        <h2>Formy płatności</h2>
                        <h6 class="mt-4 fw-bold">Nasi klienci mają do wyboru kilka form płatności:</h6>
                        <p class="mt-4">
                            <span class="text-primary d-block">Przelew na konto bankowe</span>
                            Forma płatności dla Klientów preferujących samodzielne logowanie do banku internetowego, wizytę w placówce banku lub na poczcie. Po zarezerwowaniu zamówionego towaru, klient otrzymuje mailem numer rachunku bankowego, na który należy przelać właściwą kwotę. Z chwilą zaksięgowania wpłaty na rachunku bankowym zamówienie jest przekazywane do magazynu w celu przygotowania wysyłki.
                        </p>
                        <p class="mt-4">
                            <span class="text-primary d-block">Za pobraniem</span>
                            Zapłata gotówką kurierowi przy odbiorze zamówienia.
                        </p>
                        <p class="mt-4">
                            <span class="text-primary d-block">Przelewem online </span>
                            Forma płatności elektronicznej obsługiwana przez Przelewy24
                        </p>
                        <p class="mt-4 text-primary">Kartą płatniczą, Apple Pay, Google Pay</p>
                        <p class="mt-4">
                            Operatorem kart płatniczych jest PayPro SA Agent Rozliczeniowy, ul. Kanclerska 15, 60-327 Poznań, wpisany do Rejestru Przedsiębiorców Krajowego Rejestru Sądowego prowadzonego przez Sąd Rejonowy Poznań Nowe Miasto i Wilda w Poznaniu, VIII Wydział Gospodarczy Krajowego Rejestru Sądowego pod numerem KRS 0000347935, NIP 7792369887, Regon 301345068.
                        </p>
                        <div class="img-wrapper mt-4 d-flex justify-content-center">
                            <img src="{{ asset('images/payment_logos.png') }}" alt="" class="img-fluid d-md-block d-none">
                            <img src="{{ asset('images/payment_logos_mobile.png') }}" alt="" class="img-fluid d-md-none d-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section returns and complaints ends -->

@endsection
