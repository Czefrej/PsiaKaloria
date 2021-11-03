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
{{--            <div class="col-md-6 col-12 mt-md-0 mt-3">--}}
{{--                <div class="input-wrapper mt-md-4 mt-0">--}}
{{--                    <label class="fw-light">Kraj</label>--}}
{{--                    <input type="text" class="form-control border-0 py-2">--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="row mt-4">
            <div class="col">
                <input class="styled-checkbox" id="styled-checkbox-2" type="checkbox" wire:model="register">
                <label for="styled-checkbox-2">Chcę założyć konto, a zarazem zgadzam oświadczam, że zapoznałem się z Polityką prywatności i Warunkami Umowy Psia Kaloria <img src="{{ asset('images/info_icon.svg') }}" alt=""></label>

                @if($register)
                    <div class="row mt-4">
                        <div class="col-md-6 col-12">
                            <div class="input-wrapper">
                                <label class="fw-light">Hasło</label>
                                <input type="password" wire:model="password" class="form-control border-0 py-2">
                                @error('password') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mt-md-0 mt-3">
                            <div class="input-wrapper">
                                <label class="fw-light">Potwierdź hasło</label>
                                <input type="password" wire:model="password_confirmation" class="form-control border-0 py-2">
                                @error('password_confirmation') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
