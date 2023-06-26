@extends('layouts.plantilla')


    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/tables.css') }}">
    @endpush


@section('title', 'Index')

@section('content')
<div class="general">
<div class="search">
    <form action="{{ route('contabilidad.busqueda') }}" method="GET" class="search">        
        <input type="text" name="busqueda" id="texto" class="form-control" placeholder="Buscar un archivo">
        <input type="submit" value="Buscar" class="btn btn-primary">
    </form>
</div>

<div class="cargar">
    <form action="{{ route('contabilidad.create') }}" method="GET">
        <button type="submit" class="btn btn-danger">CARGAR</button>
    </form>
</div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de archivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if ($filteredFiles->isEmpty())
                <tr>
                    <td colspan="3">No se encontraron archivos.</td>
                </tr>
            @else
                @foreach ($filteredFiles as $file)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $file->getFilename() }}</td>
                        <td>
                            <a href="{{ route('contabilidad.show', basename($file)) }}" target="_blank">
                                <button class="btn btn-info">Abrir</button>
                            </a>
                            <form action="{{ route('contabilidad.destroy', basename($file)) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>                        
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
</div>
@endsection
