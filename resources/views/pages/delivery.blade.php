@extends('layout.main')

@section('content')

    <!-- Section returns and complaints start -->
    <section class="returns-and-complaints">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title text-left mb-3 mt-5">
                        <h2>Czas i koszty dostawy</h2>
                    </div>
                </div>
                <div class="col-12 mb-4 mt-2">
                    <div class="card">
                        <h2>Koszt</h2>
                        <p class="mt-3">
                            Jest uzależniony od formy płatności oraz łącznej wagi zamówienia.W przypadku przekroczenia maksymalnej wagi paczki, zamówienie dzielone jest na parę przesyłek.
                        </p>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="text-primary mt-3">Waga paczki</p>
                                <p class="mt-3">
                                    Paczkomaty (do 24kg) <br>
                                    Kurier DPD (do 30kg) <br>
                                    Kurier InPost (do 29kg)
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-primary mt-3">Przelew/płatność online</p>
                                <p class="mt-3">
                                    14,99 zł <br>
                                    17,00 zł <br>
                                    17,00 zł
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-primary mt-3">Płatność za pobraniem</p>
                                <p class="mt-3">
                                    N/D <br>
                                    20 zł <br>
                                    20 zł
                                </p>
                            </div>
                        </div>
                        <p class="mt-3">Próg darmowej dostawy to 150 zł i obowiązuje dla przesyłek kurierskich DPD.</p>
                    </div>
                </div>
                <div class="col-12 mb-10">
                    <div class="card">
                        <h2>Czas dostawy</h2>
                        <p class="mt-3">
                            Całkowity czas realizacji zamówienia (wraz z dostawą) wynosi od 2-5 dni roboczych - jeśli produkt znajduje się na magazynie. W innych przypadkach prosimy o kontakt z naszym sklepem.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section returns and complaints ends -->

@endsection
