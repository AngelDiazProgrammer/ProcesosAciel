@extends('layouts.plantilla')
 
@section('title', 'Index')

@section('content')
<body>
    <form action="{{ route('pdf.index') }}" method="GET">
        <button type="submit" class="btn btn-danger">Ir a la página de PDFs</button>
    </form>
    <form action="{{ route('pdf.create') }}" method="GET">
        <button type="submit" class="btn btn-danger">cargar nuevo archivo</button>
    </form>
</body>
@endsection



