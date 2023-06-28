@extends('layouts.plantilla')
 
@section('title', 'Index')


@section('content')

<div class="formulario">
  <h2>Crear Carpeta</h2>

  <div class="formulario">

    <form action="{{ route('creador.crear') }}" method="GET">
        @csrf
        <label for="nombreParametro">Ingrese el nombre de la carpeta:</label>
        <input type="text" name="nombreParametro" id="nombreParametro"> <br>
        <button type="submit">Generar Carpeta</button>
      </form>
    </div>
</div>
  @endsection
  