@if($remaining > 0)
    <div class="col-12 mt-4 d-md-block">
        <div class="bg-gray">Do darmowej dostawy brakuje ci {{$remaining}} zł</div>
    </div>
@else
    <div class="col-12 mt-4 d-md-block">
        <div class="bg-green">Przysługuje ci darmowa dostawa! Oszczędzasz nawet do {{$delivery_discount}} zł</div>
    </div>
@endif
