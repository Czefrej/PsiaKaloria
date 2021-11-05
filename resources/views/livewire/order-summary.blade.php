<div class="col-lg-4 mt-lg-0 mt-md-4 mt-4">
    <div class="card py-4 px-4">
        <div class="title">
            <h2>Podsumowanie</h2>
        </div>
        <div class="d-flex gap-4 mt-4 total-item">
            <span class="text-muted">Rodzaj</span>
            <span>jednorazowy zakup</span>
        </div>
        <div class="d-flex gap-4 mt-3 total-item">
            <span class="text-muted">Wysyłka</span>
            <span>1-2 dni robocze</span>
        </div>
        <div class="d-flex gap-4 mt-3 total-item">
            <span class="text-muted">Wartość <br> produktów</span>
            <span>{{$price}} zł</span>
        </div>
        <div class="d-flex gap-4 mt-3 total-item">
            <span class="text-muted">Dostawa</span>
            <span>@if($delivery != null) @if($delivery_price == 0) gratis @else {{$delivery_price}} zł @endif @else Wybierz sposób dostawy @endif</span>
        </div>
        <div class="d-flex gap-4 mt-3 total-item">
            <span class="text-muted">Rabat</span>
            <span class="text-primary">-19,80 zł</span>
        </div>
        <div class="d-flex justify-content-between mt-4 align-items-center">
            <span class="fs-5 fw-light">Łącznie do zapłaty</span>
            <span class="fs-4 fw-bold">{{$price + $delivery_price}} zł</span>
        </div>

        <button class="btn btn-success d-block mt-4" wire:click.prevent="submit">Złóż zamówienie</button>
    </div>
</div>
