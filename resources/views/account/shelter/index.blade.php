@extends('layout.main')
@push('after-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/datatables.min.js"></script>
    <style>
        .buttons-html5{
            font-size :10px !important;
        }
    </style>
@endpush

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    @include('sidebars.account_sidebar')
                </div>
                <div class="col-lg-10">
                    <div class="title text-left mb-4 d-md-block">
                        <a href="{{route('account.shelter.create')}}" class="text-decoration-none"><img src="{{ asset('images/plus_icon.svg') }}"> <small class="ms-1 text-muted">Dodaj nowe schronisko</small></a>
                        <span class="title-leading text-primary mb-2 d-block">&nbsp;</span>
                        <h2 class="mt-3">Lista schronisk</h2>
                    </div>
                    <div class="editable-wrapper">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table id="shelters-table" class="table table-striped display">
                            <thead>
                            <tr>
                                <th>Nazwa</th>
                                <th>Adres</th>
                                <th>Kod pocztowy</th>
                                <th>Miasto</th>
                                <th>Aktywne</th>
                                <th>Ukraina</th>
                                <th>Akcja</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            </tbody>
                        </table>
                        <a href="{{route('account.shelter.create')}}" class="text-decoration-none"><img src="{{ asset('images/plus_icon.svg') }}"> <small class="ms-1 text-muted">Dodaj nowe schronisko</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('after-scripts')
<script>
    $(document).ready( function () {
        var table = $('#shelters-table').DataTable({
            data: @json($data),
            responsive: true,
            dom: 'Bfrtip',
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/pl.json'
            },
            buttons: [
                'excel', 'pdf'
            ]
        });

    } );
</script>
@endpush
