@extends('layouts.plantilla')
 
@section('title', 'Index')

@section('styles')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">
@endpush

@section('content')
<form action="{{ route('pdf.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div>
    <label for="pdf">Seleccionar archivo PDF:</label>
    <input type="file" name="pdf[]" id="pdf" multiple>
  </div>
  <div>
    <button type="submit">Cargar PDF</button>
  </div>
</form>

  @endsection