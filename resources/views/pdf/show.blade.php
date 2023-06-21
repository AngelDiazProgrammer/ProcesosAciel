@extends('layouts.plantilla')
 
@section('title', 'Index')

@section('content')
<iframe src="{{ $pdfUrl }}" style="width: 100%; height: 600px;"></iframe>
@endsection