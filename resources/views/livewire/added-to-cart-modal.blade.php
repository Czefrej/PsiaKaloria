<div class="dropdown-menu dropdown-menu-lg-end" id="{{$dropdown_id}}">
    @foreach($cart as $item)
        <div class="mt-5">
            <h6>{{$item->model->name}}</h6>
            <span class="fw-light">Ilość: {{$item->qty}}</span>
            <span class="ps-4 fw-light">Cena: {{$item->model->gross_base_price * $item->qty}} zł</span>
        </div>
    @endforeach
    <a href="{{route('cart')}}" class="btn btn-primary mt-4 d-block">Zobacz koszyk</a>
    <a href="#" class="btn-link text-center d-block mt-4 text-decoration-none" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><span class="text-dark">Kontynuuj zakupy</span></a>
</div>
@push('after-scripts')

    <script>
        //let searchDropdown = new bootstrap.Dropdown("#dropdown");
        window.addEventListener('openModal', event => {
            var dropdownElementList = [].slice.call(document.querySelectorAll('#{{$dropdown_id}}'))
            var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl).show();
            })
        })
    </script>
@endpush
