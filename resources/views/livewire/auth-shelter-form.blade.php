<div wire:key="guest-shelter-form">
    <div class="card p-4">
        <div class="title d-flex align-items-center">
            <h2 class="m-0">Wspierane schronisko</h2>
        </div>
        <div class="input-wrapper mt-4">
            <label class="fw-light">Wybierz z listy schronisko, które chciałbyś wesprzeć naszą karmą.</label>
            <select class="form-select border-0 py-2 mt-4" wire:model="shelter_id">
                @foreach($shelters as $s)
                    <option value="{{$s->id}}">{{$s->name}} </option>
                @endforeach
            </select>
            @error('shelter_id') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
        </div>
    </div>

    @if(Auth::user()->savedAddresses()->count()<1)
        <div class="card p-4 mt-4">
            <div class="title d-flex align-items-center">
                <h2 class="m-0">Twoje dane</h2>
            </div>
            <div class="address-header d-flex justify-content-between mt-4">
                <h5 class="m-0">Anna Nowak</h5>
                <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="text-primary">Zmień</span></a>
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
                <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="text-primary">Zmień</span></a>
            </div>
            <p class="fw-light mt-4">
                ul. Przykładowa 21 m 5 <br>
                15-842 Białystok <br>
                NIP: 12345678
            </p>
        </div>
    @else
        <div class="card p-4 mt-4">
            <div class="title d-flex align-items-center">
                <h2 class="m-0">Twoje dane</h2>
                <span class="text-muted ms-5 d-md-block d-none">Masz konto? Zaloguj się</span>
            </div>
            <div class="row mt-4">
                <div class="col">
                    {{--                <div class="checkbox-wrapper">--}}
                    {{--                    <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" name="invoice" wire:model="company">--}}
                    {{--                    <label for="styled-checkbox-1">Chcę otrzymać fakture</label>--}}
                    {{--                </div>--}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="btn-group mt-4 d-flex gap-4">
                                <a href="#" class="btn @if($company) btn-gray-outline @else btn-primary-outline @endif" wire:click.prevent="setCompanyPurchase(false)">osoba prywatna</a>
                                <a href="#" class="btn @if($company) btn-primary-outline @else btn-gray-outline @endif" wire:click.prevent="setCompanyPurchase(true)">firma</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input hidden wire:model="company">
            @if($company)
                <div class="row mt-4">
                    <div class="col-md-6 col-12">
                        <div class="input-wrapper">
                            <label class="fw-light">Nazwa firmy</label>
                            <input type="text" class="form-control border-0 py-2" wire:model="company_name">
                            @error('company_name') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12 mt-md-0 mt-3">
                        <div class="input-wrapper">
                            <label class="fw-light">NIP</label>
                            <input type="text" class="form-control border-0 py-2" wire:model="tax_id">
                            @error('tax_id') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
            @else
                <div class="row mt-4">
                    <div class="col-md-6 col-12">
                        <div class="input-wrapper">
                            <label class="fw-light">Imię</label>
                            <input type="text" class="form-control border-0 py-2" wire:model="name">
                            @error('name') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12 mt-md-0 mt-3">
                        <div class="input-wrapper">
                            <label class="fw-light">Nazwisko</label>
                            <input type="text" class="form-control border-0 py-2" wire:model="surname">
                            @error('surname') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
            @endif
            <div class="row mt-4">
                <div class="col-md-6 col-12">
                    <div class="input-wrapper">
                        <label class="fw-light">Adres e-mail</label>
                        <input type="email" class="form-control border-0 py-2" wire:model="email">
                        @error('email') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12 mt-md-0 mt-3">
                    <div class="input-wrapper">
                        <label class="fw-light">Numer telefonu</label>
                        <input type="text" class="form-control border-0 py-2" wire:model="phone">
                        @error('phone') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="title d-flex align-items-center mt-4">
                <h2 class="m-0">Adres</h2>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 col-12">
                    <div class="input-wrapper">
                        <label class="fw-light">Ulica i numer</label>
                        <input type="text" class="form-control border-0 py-2" wire:model="address">
                        @error('address') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-2 col-5 mt-md-0 mt-3">
                    <div class="input-wrapper">
                        <label class="fw-light">Kod pocztowy</label>
                        <input type="text" class="form-control border-0 py-2" wire:model="postal">
                        @error('postal') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4 col-7 mt-md-0 mt-3">
                    <div class="input-wrapper">
                        <label class="fw-light">Miejscowość</label>
                        <input type="text" class="form-control border-0 py-2" wire:model="city">
                        @error('city') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12 mt-md-0 mt-3">
                    <div class="input-wrapper mt-md-4 mt-0">
                        <label class="fw-light">Kraj</label>
                        <select class="form-select border-0 py-2" wire:model="country">
                            <option value="PL">Polska</option>
                        </select>
                        @error('country') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-lg-down">
            <div class="modal-content">
                <div class="modal-header px-4 pt-4 pb-0 mt-1">
                    <h4>Twoje adresy</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0 px-4">
                    <div class="address-wrapper">
                        <div class="row">
                            <div class="col-6">
                                <div class="address-header d-flex justify-content-between">
                                    <h5 class="m-0">Anna Nowak</h5>
                                </div>
                                <p class="fw-light mt-4">
                                    ul. Przykładowa 21 m 5 <br>
                                    15-842 Białystok, Polska <br>
                                    +48 852 456 111
                                </p>
                            </div>
                            <div class="col-6 d-flex justify-content-start flex-column text-end gap-2">
                                <a href="#" class="btn btn-primary">Użyj tego adresu</a>
                                <a href="#" class="text-decoration-none"><span class="text-primary">Edytuj</span></a>
                                <a href="#" class="text-decoration-none"><span class="text-primary">Usuń</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="address-wrapper">
                        <div class="row">
                            <div class="col-6">
                                <div class="address-header d-flex justify-content-between">
                                    <h5 class="m-0">Anna Nowak</h5>
                                </div>
                                <p class="fw-light mt-4">
                                    ul. Przykładowa 21 m 5 <br>
                                    15-842 Białystok, Polska <br>
                                    +48 852 456 111
                                </p>
                            </div>
                            <div class="col-6 d-flex justify-content-start flex-column text-end gap-2">
                                <a href="#" class="btn btn-primary">Użyj tego adresu</a>
                                <a href="#" class="text-decoration-none"><span class="text-primary">Edytuj</span></a>
                                <a href="#" class="text-decoration-none"><span class="text-primary">Usuń</span></a>
                            </div>
                        </div>
                    </div>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn btn-primary-light mt-3 d-flex align-items-center w-100 justify-content-center gap-2">
                        <img src="{{ asset('images/plus_icon.svg') }}" alt="">
                        <span>Dodaj nowy adres</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header px-4 pt-4 pb-0 mt-1">
                    <h4>Twoje dane</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0 px-4">
                    <div class="row mt-4">
                        <div class="col-md-6 col-12">
                            <div class="input-wrapper">
                                <label class="fw-light">Imię</label>
                                <input type="text" class="form-control border-0 py-2" placeholder="a.nowak@gmail.com">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mt-md-0 mt-3">
                            <div class="input-wrapper">
                                <label class="fw-light">Nazwisko</label>
                                <input type="text" class="form-control border-0 py-2" placeholder="a.nowak@gmail.com">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 col-12">
                            <div class="input-wrapper">
                                <label class="fw-light">E-mail</label>
                                <input type="text" class="form-control border-0 py-2" placeholder="a.nowak@gmail.com">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mt-md-0 mt-3">
                            <div class="input-wrapper">
                                <label class="fw-light">Numer telefonu</label>
                                <input type="text" class="form-control border-0 py-2" placeholder="a.nowak@gmail.com">
                            </div>
                        </div>
                    </div>
                    <div class="title d-flex align-items-center mt-4">
                        <h2 class="m-0">Adres</h2>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 col-12">
                            <div class="input-wrapper">
                                <label class="fw-light">Ulica i numer</label>
                                <input type="text" class="form-control border-0 py-2" placeholder="a.nowak@gmail.com">
                            </div>
                        </div>
                        <div class="col-md-2 col-5 mt-md-0 mt-3">
                            <div class="input-wrapper">
                                <label class="fw-light">Kod pocztowy</label>
                                <input type="text" class="form-control border-0 py-2" placeholder="__-___">
                            </div>
                        </div>
                        <div class="col-md-4 col-7 mt-md-0 mt-3">
                            <div class="input-wrapper">
                                <label class="fw-light">Miejscowość</label>
                                <input type="text" class="form-control border-0 py-2" placeholder="Warszawa">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mt-md-0 mt-3">
                            <div class="input-wrapper mt-md-4 mt-0">
                                <label class="fw-light">Kraj</label>
                                <select class="form-select border-0 py-2">
                                    <option value="Polska">Polska</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-4 mb-3">
                            <a href="#" class="btn btn-primary-light flex-grow-1">Anuluj</a>
                            <a href="#" class="btn btn-primary flex-grow-1">Zapisz zmiany</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
