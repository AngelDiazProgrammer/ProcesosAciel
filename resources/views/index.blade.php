@extends('layouts.plantilla')


@push('styles')
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">
<link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endpush

@section('title', 'Index')

@section('content')
<div class="container">
    <form action="{{ route('pdf.index') }}" method="GET">
        <button type="submit" class="btn btn-danger">Ir a la página de PDFs</button>
    </form>
    <form action="{{ route('pdf.create') }}" method="GET">
        <button type="submit" class="btn btn-danger">cargar nuevo archivo</button>
    </form>
    <form action="{{ route('sistemas.index') }}" method="GET">
        <button type="submit" class="btn btn-danger">sistemas</button>
    </form>
    <form action="{{ route('contabilidad.index') }}" method="GET">
        <button type="submit" class="btn btn-danger">contabilidad</button>
    </form>
</div>
@endsection



