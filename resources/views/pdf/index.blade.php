@extends('layouts.plantilla')
 
@section('styles')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">
@endpush
@section('title', 'Index')

@section('content')
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
                    <td>{{ $pdf->id }}</td>
                    <td>{{ $pdf->nombre_archivo }}</td>
                    <td>
                        <a href="{{ route('pdf.show', $pdf->nombre_archivo) }}" target="_blank"><button class="btn btn-info">Abrir</button></a>
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