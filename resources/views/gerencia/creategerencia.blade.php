@extends('layouts.plantilla')
 
    @section('title', 'Index')
    
    @push('styles')
    <link rel='stylesheet' href='{{ asset('css/formulario.css') }}'>
    @endpush
    
    @section('content')
    
    <div class='formulario'>
      <div class='formulario'>
        <form action='{{ route('gerencia.store') }}' method='POST' enctype='multipart/form-data'>
          @csrf
          <div>
            <label for='pdf'>Seleccionar archivo PDF:</label>
            <input type='file' name='pdf[]' accept='application/pdf' id='pdf' multiple>
          </div>
          <div>
            <button type='submit'>Cargar PDF</button>
          </div>
        </form>
      </div>
    </div>
    @endsection