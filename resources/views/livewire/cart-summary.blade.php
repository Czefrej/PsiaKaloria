
<div class="col-lg-4">
    <div class="card mt-4 pt-5 px-4 pb-4">
        <h2>Podsumowanie</h2>
        <span class="d-block text-muted mt-3">Rodzaj</span>
        <div class="btn-group d-flex gap-4 mt-3">
            <a href="#" class="btn @if($subscription)btn-gray-outline @else btn-primary-outline @endif" wire:click.prevent="makeOneTimePurchase">jednorozowy zakup</a>
            <a href="#" class="btn @if($subscription)btn-primary-outline @else btn-gray-outline @endif" wire:click.prevent="makeSubscription">subskrypcja</a>
        </div>
        <table class="mt-3 cart-table">
            <tr>
                <td class="text-muted py-2">Wysyłka</td>
                <td class="text-start py-2">1-2 dni robocze</td>
            </tr>
            <tr>
                <td class="text-muted py-2">Dostawa</td>
                <td class="text-start py-2">w następnym kroku</td>
            </tr>
            <tr>
                <td class="text-muted py-2">Koszt</td>
                <td class="text-start py-2">{{$total}} zł</td>
            </tr>
            <tr>
                <td class="text-muted py-2">Rabat</td>
                <td class="text-start py-2 text-primary">-{{$discount}} zł</td>
            </tr>
        </table>
        <div class="d-flex justify-content-between mt-3">
            <span class="pt-2">Łącznie do zapłaty</span>
            <span class="text-end fw-bolder fs-3">
                {{$total - $discount}} zł
                @if($free_delivery)
                    <span class="text-muted d-block">Darmowa dostawa</span>
                @else
                    <span class="text-muted d-block">+ dostawa</span>
                @endif
            </span>
        </div>
        <div class="btns">
            <a href="{{route('order',['subscription' => $subscription,'donation'=>0])}}" class="btn btn-success d-block mt-4">Złóż zamówienie</a>
            <a href="{{route('order',['subscription' => $subscription,'donation'=>1])}}" class="btn btn-warning d-block mt-4">Zamów do schroniska</a>
        </div>
    </div>
</div>
