<div class="editable-wrapper">
    <form wire:submit.prevent="submit">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="input-wrapper mb-4">
            <label class="mb-1">Nazwa schroniska</label>
            <input type="text" class="form-control border-0 py-2" wire:model="name" name="name" value="{{$name}}" required>
            @error('name') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror

        </div>
        <div class="row">
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Adres e-mail</label>
                    <input type="email" class="form-control border-0 py-2" wire:model="email" name="email" value="{{$email}}" required>
                    @error('email') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Numer telefonu</label>
                    <input type="text" class="form-control border-0 py-2" wire:model="phone" name="phone" value="{{$phone}}" required>
                    @error('phone') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>
        </div>

        <div class="input-wrapper mb-4">
            <label class="mb-1">Adres</label>
            <input type="text" class="form-control border-0 py-2" wire:model="address" name="address" value="{{$address}}" required>
            @error('address') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
        </div>
        <div class="row">
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Kod pocztowy</label>
                    <input type="text" class="form-control border-0 py-2" wire:model="postal" name="postal" value="{{$postal}}" required>
                    @error('postal') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Miasto</label>
                    <input type="text" class="form-control border-0 py-2" wire:model="city" name="city" value="{{$city}}" required>
                    @error('city') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Długość geograficzna</label>
                    <input type="text" class="form-control border-0 py-2" wire:model="long" name="long" value="{{$long}}" required>
                    @error('long') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Szerokość geograficzna</label>
                    <input type="text" class="form-control border-0 py-2" wire:model="lat" name="lat" value="{{$lat}}" required>
                    @error('lat') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label for="voivodeship" class="mb-1">Województwo</label>
                    <select id="voivodeship" name="voivodeship" wire:model="voivodeship" class="form-select border-0 py-2" >
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
                    @error('voivodeship') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>
        </div>

        <div class="input-wrapper mb-4">
            <div class="d-flex gap-3 mt-4 align-items-center">
                <div class="flipswitch">
                    <input type="checkbox" name="flipswitch" class="flipswitch-cb" id="ukraine" wire:model="ukraine" checked>
                    <label class="flipswitch-label" for="ukraine">
                        <div class="flipswitch-inner"></div>
                        <div class="flipswitch-switch"></div>
                    </label>
                </div>
                <span>Zwierzęta z Ukrainy</span>
            </div>
            @error('ukraine') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
        </div>

        <div class="input-wrapper mb-4">
            <div class="d-flex gap-3 mt-4 align-items-center">
                <div class="flipswitch">
                    <input type="checkbox" name="flipswitch" class="flipswitch-cb" id="active" wire:model="active" checked>
                    <label class="flipswitch-label" for="active">
                        <div class="flipswitch-inner"></div>
                        <div class="flipswitch-switch"></div>
                    </label>
                </div>
                <span>Shcronisko aktywne na Psia Kaloria</span>
            </div>
            @error('active') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
        </div>

        <div class="btn-wrapper d-flex gap-4">
            <a href="{{route('account.shelter.index')}}" class="btn btn-primary-light w-50">Anuluj</a>
            <button type="submit" class="btn btn-primary w-50">Zapisz zmiany</button>
        </div>
    </form>
</div>
