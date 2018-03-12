@extends('templates.default1')

@section('content')
    @component('pages.components.alert')
        @slot('title')
            telah terjadi Error
        @endslot
    @endcomponent
@endsection