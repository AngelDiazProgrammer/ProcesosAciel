@extends('layouts.plantilla')
 
@section('title', 'Index')


@section('content')

<div class="formulario">
  <h2>Carga de archivos</h2>
  <div class="formulario">
<form action="{{ route('contabilidad.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div>
    <label for="pdf">Seleccionar archivo PDF:</label>
    <span class="form__line"></span>
    <input type="file" name="pdf[]" accept="application/pdf" id="pdf" multiple>
    <span class="form__line"></span>
  </div>
  <div>
    <button type="submit">Cargar PDF</button>
  </div>
</form>
</div>
</div>
  @endsection