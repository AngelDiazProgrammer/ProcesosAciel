@extends('layouts.plantilla')

    @section('title', 'Index')
    
    @push('styles')
    <link rel='stylesheet' href='{{ asset('css/tables.css') }}'>
    @endpush
    
    @section('content')
    
    <div class='formulario'>
      <div class='formulario'>
        <form action='{{ route('sistemas.store') }}' method='POST' enctype='multipart/form-data'>
          @csrf
          <div>
            <label for='pdf'>Seleccionar archivo PDF:</label>
            <div class='validation'>
              @error('pdf')
              <div class='validation-message error'>
                <small>*{{ $message }}</small>
              </div>
              @enderror
            </div>
            <input type='file' name='pdf[]' accept='application/pdf' id='pdf' multiple>
          </div>
          <div>
            <button type='submit'>Cargar PDF</button>
          </div>
        </form>
      </div>
    </div>
    
    @endsection
    