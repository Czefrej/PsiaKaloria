<div class="editable-wrapper">
    <form wire:submit.prevent="submit">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="input-wrapper mb-4">
            <label class="mb-1">SKU</label>
            <input type="text" class="form-control border-0 py-2" wire:model="sku" name="sku" value="{{$sku}}" required>
            @error('sku') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
        </div>

        <div class="row">
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Waga produktu</label>
                    <input type="number" step="0.01" class="form-control border-0 py-2" wire:model="weight" name="weight" value="{{$weight}}" required>
                    @error('weight') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Net COGS</label>
                    <input type="number" step="0.01" class="form-control border-0 py-2" wire:model="net_cogs" name="net_cogs" value="{{$net_cogs}}" required>
                    @error('net_cogs') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label for="tax_group" class="mb-1">Grupa podatkowa</label>
                    <select id="tax_group" name="tax_group" wire:model="tax_group" class="form-select border-0 py-2" >
                        <option>Wybierz grupę podatkową</option>
                        <option value="PET_FOOD_WET">PET_FOOD_WET</option>
                    </select>
                    @error('tax_group') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="input-wrapper mb-4">
                    <label class="mb-1">Cena pakowania</label>
                    <input type="number" step="0.01" class="form-control border-0 py-2" wire:model="net_packaging_price" name="net_packaging_price" value="{{$net_packaging_price}}" required>
                    @error('net_packaging_price') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                </div>
            </div>
        </div>



        <div class="btn-wrapper d-flex gap-4">
            <a href="{{route('account.analytics.product.index')}}" class="btn btn-primary-light w-50">Anuluj</a>
            <button type="submit" class="btn btn-primary w-50">Zapisz zmiany</button>
        </div>
    </form>
</div>
