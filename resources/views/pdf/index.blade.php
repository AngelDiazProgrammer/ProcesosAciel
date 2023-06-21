@extends('layouts.plantilla')
 
@section('title', 'Index')

@section('content')

<table class="table">
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
                        <a href="{{ route('pdf.show', $pdf->nombre_archivo) }}" target="_blank">Abrir</a>
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
@endsection