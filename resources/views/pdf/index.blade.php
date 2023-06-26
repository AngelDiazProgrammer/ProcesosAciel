@extends('layouts.plantilla')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/tables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    
@endpush


@section('title', 'Index')

@section('content')

<div class="general">
    <div class="search">
        <form action="{{ route('pdf.busqueda') }}" method="GET" class="search">        
            <input type="text" name="busqueda" id="texto" class="form-control" placeholder="Buscar un archivo">
            <input type="submit" value="Buscar"  class="btn btn-primary">
        </form>
    </div>

    <div class="cargar">
        <form action="{{ route('pdf.create') }}" method="GET">
            <button type="submit" class="btn btn-danger">CARGAR</button>
        </form>
        </div>

    <div id="resultados" class="container">
        <!-- Aquí se mostrarán los resultados de la búsqueda -->
    </div>

    <div class="table">
        <table id="table" name="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de archivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($pdfs))
                    @foreach ($pdfs as $pdf)
                        <tr>
                            <td>{{ $pdf->id }}</td>
                            <td>{{ $pdf->nombre_archivo }}</td>
                            <td>
                                <a href="{{ route('pdf.show', $pdf->nombre_archivo) }}" target="_blank">
                                    <button class="btn btn-info">Abrir</button>
                                </a>

                                <form action="{{ route('pdf.destroy', $pdf->nombre_archivo) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No se encontraron PDFs</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    </div>
@endsection
