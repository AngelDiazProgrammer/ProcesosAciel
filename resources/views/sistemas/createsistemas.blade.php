@extends('layouts.plantilla')
 
@section('title', 'Index')

@section('styles')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">
@endpush

@section('content')

<div class="container">
<form action="{{ route('sistemas.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div>
    <label for="pdf">Seleccionar archivo PDF:</label>
    <input type="file" name="pdf[]" id="pdf" multiple>
  </div>
  <div>
    <button type="submit">Cargar PDF</button>
  </div>
</form>
</div>
  @endsection