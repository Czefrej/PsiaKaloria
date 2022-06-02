<div class="editable-wrapper">
    <form wire:submit.prevent="submit">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="input-wrapper mb-4">
            <label class="mb-1">Nazwa schroniska</label>
            <input type="text" class="form-control border-0 py-2" wire:model="shelter.name" name="name" value="{{$shelter->name}}" required>
            @error('shelter.name') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror

        </div>
        <div class="row">
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Adres e-mail</label>
                    <input type="email" class="form-control border-0 py-2" wire:model="shelter.email" name="email" value="{{$shelter->email}}" required>
                    @error('shelter.email') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Numer telefonu</label>
                    <input type="text" class="form-control border-0 py-2" wire:model="shelter.phone" name="phone" value="{{$shelter->phone}}" required>
                    @error('shelter.phone') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>
        </div>

        <div class="input-wrapper mb-4">
            <label class="mb-1">Adres</label>
            <input type="text" class="form-control border-0 py-2" wire:model="shelter.address" name="address" value="{{$shelter->address}}" required>
            @error('shelter.address') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
        </div>
        <div class="row">
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Kod pocztowy</label>
                    <input type="text" class="form-control border-0 py-2" wire:model="shelter.postal_code" name="postal" value="{{$shelter->postal_code}}" required>
                    @error('shelter.postal_code') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Miasto</label>
                    <input type="text" class="form-control border-0 py-2" wire:model="shelter.city" name="city" value="{{$shelter->city}}" required>
                    @error('shelter.city') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Długość geograficzna</label>
                    <input type="text" class="form-control border-0 py-2" wire:model="shelter.map_longitude" name="longitude" value="{{$shelter->map_longitude}}" required>
                    @error('shelter.map_longitude') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Szerokość geograficzna</label>
                    <input type="text" class="form-control border-0 py-2" wire:model="shelter.map_latitude" name="latitude" value="{{$shelter->map_latitude}}" required>
                    @error('shelter.map_latitude') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label for="voivodeship" class="mb-1">Województwo</label>
                    <select id="voivodeship" name="voivodeship" wire:model="shelter.voivodeship" class="form-select border-0 py-2" >
                        <option>Wybierz województwo</option>
                        <option value="dolnośląskie">dolnośląskie</option>
                        <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
                        <option value="lubelskie">lubelskie</option>
                        <option value="lubuskie">lubuskie</option>
                        <option value="łódzkie">łódzkie</option>
                        <option value="małopolskie">małopolskie</option>
                        <option value="mazowieckie">mazowieckie</option>
                        <option value="opolskie">opolskie</option>
                        <option value=podkarpackie"">podkarpackie</option>
                        <option value="podlaskie">podlaskie</option>
                        <option value="pomorskie">pomorskie</option>
                        <option value="śląskie">śląskie</option>
                        <option value="świętokrzyskie">świętokrzyskie</option>
                        <option value="warmińsko-mazurskie">warmińsko-mazurskie</option>
                        <option value="wielkopolskie">wielkopolskie</option>
                        <option value="zachodniopomorskie">zachodniopomorskie</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="input-wrapper mb-4">
            <div class="d-flex gap-3 mt-4 align-items-center">
                <div class="flipswitch">
                    <input type="checkbox" name="flipswitch" class="flipswitch-cb" id="ukraine" wire:model="shelter.ukraine" @if($shelter->ukraine) checked @endif>
                    <label class="flipswitch-label" for="ukraine">
                        <div class="flipswitch-inner"></div>
                        <div class="flipswitch-switch"></div>
                    </label>
                </div>
                <span>Zwierzęta z Ukrainy</span>
            </div>
        </div>

        <div class="input-wrapper mb-4">
            <div class="d-flex gap-3 mt-4 align-items-center">
                <div class="flipswitch">
                    <input type="checkbox" name="flipswitch" class="flipswitch-cb" id="active" wire:model="shelter.active"  @if($shelter->active) checked @endif>
                    <label class="flipswitch-label" for="active">
                        <div class="flipswitch-inner"></div>
                        <div class="flipswitch-switch"></div>
                    </label>
                </div>
                <span>Shcronisko aktywne na Psia Kaloria</span>
            </div>
        </div>

        <div class="btn-wrapper d-flex gap-4">
            <a href="{{route('account.shelter.index')}}" class="btn btn-primary-light w-50">Anuluj</a>
            <button type="submit" class="btn btn-primary w-50">Zapisz zmiany</button>
        </div>
    </form>

</div>
