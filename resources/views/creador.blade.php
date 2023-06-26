@extends('layouts.plantilla')
 
@section('title', 'Index')


@section('content')

<div class="formulario">
  <h2>Carga de archivos</h2>
  <div class="formulario">

    <form action="{{ route('creador.crear') }}" method="GET">
        @csrf
        <label for="nombreParametro">Ingrese el parámetro:</label>
        <input type="text" name="nombreParametro" id="nombreParametro">
        <button type="submit">Generar vistas y controlador</button>
      </form>
</div>
</div>
  @endsection
  