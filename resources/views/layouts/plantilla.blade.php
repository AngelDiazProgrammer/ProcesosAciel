<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Resto de las etiquetas head -->
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <!-- Resto del código -->    
    <title>@yield('title')</title>
</head>

<body>
    @include('layouts.header')
    @yield('content')


    
</body>

</html>
