@extends('layouts.plantilla')
 
@section('title', 'Index')

@section('styles')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">
@endpush
@section('title', 'Index')

@section('content')
    <form action="{{ route('pdf.index') }}" method="GET">
        <button type="submit" class="btn btn-danger">Ir a la página de PDFs</button>
    </form>
    <form action="{{ route('pdf.create') }}" method="GET">
        <button type="submit" class="btn btn-danger">cargar nuevo archivo</button>
    </form>
    <form action="{{ route('sistemas.index') }}" method="GET">
        <button type="submit" class="btn btn-danger">sistemas</button>
    </form>
   
@endsection



