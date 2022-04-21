@extends('layout.main')

@section('content')
    @livewire('order',['donation'=>$donation,'subscription'=>$subscription])
@endsection
