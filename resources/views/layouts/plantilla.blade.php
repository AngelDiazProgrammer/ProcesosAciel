<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <title>@yield('title')</title>
</head>
<body>
<header>
<div class="logo">
<img src="{{asset('img/aciel.png')}}" alt="logo_Aciel">
</div>
<nav>
    <button>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
        INTRANET
    </button>
    <button>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        PRUEBA 1
    </button>
    <button>
        <span></span>
        <span></span>
        <span></span>
        <span></span> 
        PRUEBA 2       
    </button>
</nav>
</header>

@yield('content')

</body>
</html>