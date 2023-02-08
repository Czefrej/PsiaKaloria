<div class="editable-wrapper">
    <form wire:submit.prevent="submit">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif


        <div class="row">
            <div class="col-12">
                <div class="input-wrapper mb-4">
                    <label for="filetype" class="mb-1">Typ pliku</label>
                    <select id="filetype" name="filetype" wire:model="filetype" class="form-select border-0 py-2" >
                        <option>Wybierz typ pliku</option>
                        <option value="dpd">Specyfikacja DPD</option>
                        <option value="baselinker">Raport Baselinker</option>
                        <option value="inpost">Specyfikacja InPost</option>
                        <option value="allegro">Opłaty Allegro</option>
                        <option value="amazon">Opłaty Amazon</option>
                    </select>
                    @error('filetype') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div wire:loading wire:target="file">Przesyłanie...</div>
                <div class="input-wrapper mb-4">
                    <label for="file" class="mb-1">Plik</label>
                    <input id="file" name="filetype" wire:model="file" class="form-control border-0 py-2" type="file">
                    @error('file') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>
        </div>

            {{$content}}

        <div class="btn-wrapper d-flex gap-4">
{{--            <a href="{{route('account.shelter.index')}}" class="btn btn-primary-light w-50">Anuluj</a>--}}
            <button type="submit" class="btn btn-primary w-50">Zapisz zmiany</button>
        </div>
    </form>
</div>
