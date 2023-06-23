@extends('layouts.plantilla')

@section('styles')
@push('styles')

<link rel="stylesheet" href="{{ asset('css/tables.css') }}">
<link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endpush
@section('title', 'Index')
@section('content')

<div class="container">
    <form action="{{ route('sistemas.busqueda') }}" method="GET" class="search">        
        <input type="text" name="busquedasistemas" id="texto" class="form-control" placeholder="Buscar un archivo">
        <input type="submit" value="Buscar" class="btn btn-primary">
    </form>
</div>

    
</div>
<div class="container">
<form action="{{ route('sistemas.create') }}" method="GET">
    <button type="submit" class="btn btn-danger">cargar nuevo archivo</button>
</form>
</div>
<div class="container">
    <table>
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
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ basename($pdf) }}</td>
                        <td>
                            <a href="{{ route('sistemas.show', basename($pdf)) }}" target="_blank"><button class="btn btn-info">Abrir</button></a>
                            <form action="{{ route('sistemas.destroy', basename($pdf)) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>                        
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


@endsection