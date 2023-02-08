<div class="editable-wrapper">
    <form wire:submit.prevent="submit">
        <div class="input-wrapper mb-4">
            <label class="mb-1">Nazwa schroniska</label>
            <input type="text" class="form-control border-0 py-2" wire:model="shelter.name" name="name" value="{{$shelter->name}}" disabled>

        </div>
        <div class="row">
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Adres e-mail</label>
                    <input type="email" class="form-control border-0 py-2" wire:model="shelter.email" name="email" value="{{$shelter->email}}" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Numer telefonu</label>
                    <input type="text" class="form-control border-0 py-2" wire:model="shelter.phone" name="phone" value="{{$shelter->phone}}" disabled>
                </div>
            </div>
        </div>

        <div class="input-wrapper mb-4">
            <label class="mb-1">Adres</label>
            <input type="text" class="form-control border-0 py-2" wire:model="shelter.address" name="address" value="{{$shelter->address}}" disabled>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Kod pocztowy</label>
                    <input type="text" class="form-control border-0 py-2" wire:model="shelter.postal_code" name="postal" value="{{$shelter->postal_code}}" disabled>
                </div>
            </div>

            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Miasto</label>
                    <input type="text" class="form-control border-0 py-2" wire:model="shelter.city" name="city" value="{{$shelter->city}}" disabled>
                </div>
            </div>
        </div>


        <div class="input-wrapper mb-4">
            <div class="d-flex gap-3 mt-4 align-items-center">
                <div class="flipswitch">
                    <input type="checkbox" name="flipswitch" class="flipswitch-cb" id="ukraine" wire:model="shelter.ukraine" disabled @if($shelter->ukraine) checked @endif>
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
                    <input type="checkbox" name="flipswitch" class="flipswitch-cb" id="active" wire:model="shelter.active" disabled  @if($shelter->active) checked @endif>
                    <label class="flipswitch-label" for="active">
                        <div class="flipswitch-inner"></div>
                        <div class="flipswitch-switch"></div>
                    </label>
                </div>
                <span>Schronisko aktywne na Psia Kaloria</span>
            </div>
        </div>

        <div class="btn-wrapper d-flex gap-4">
            <a href="{{route('account.shelter.index')}}" class="btn btn-primary-light w-50">Anuluj</a>
            <button type="submit" class="btn btn-primary w-50">Zapisz zmiany</button>
        </div>
    </form>

</div>
