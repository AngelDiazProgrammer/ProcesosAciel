<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    @stack('styles')
    <title>@yield('title')</title>
</head>
<header>
<div class="logo">
<img src="{{asset('img/aciel.png')}}" alt="logo_Aciel">
</div>
<nav>
    <a href="https://intranet.acielcolombia.com"><button>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
        INTRANET
    </button></a>
    <a href="../public/"><button>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        INICIO
    </button></a>
    <button>
        <span></span>
        <span></span>
        <span></span>
        <span></span> 
        PRUEBA 2       
    </button>
</nav>
</header>
<body>
    @yield('content')    
</body>


</html>