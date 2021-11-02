<div>
    <div class="d-flex justify-content-between align-items-center flex-md-row flex-column">
        <div class="discount-apply">
            <label>Kod rabatowy</label>
            <div class="d-flex align-items-center gap-4 justify-content-start">
                <input type="text" wire:model="code" class="form-control border-0">
                <button class="btn btn-primary" wire:click.prevent="redeem">Wykorzystaj kod</button>
            </div>
            @if($invalid)
                <small class="text-primary mt-1 justify-content-start">Wprowadzony kod jest nieprawidłowy</small>
            @endif
        </div>
        <div class="toggle d-flex gap-3 mt-4">
            <span>Płać punktami</span>
            <input type="checkbox" id="switch" /><label for="switch">Toggle</label>
        </div>
    </div>
</div>
