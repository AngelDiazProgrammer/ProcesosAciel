<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    @stack('styles')
    <title>@yield('title')</title>
</head>
<header>
    <div class="logo">
        <img src="{{ asset('img/aciel.png') }}" alt="logo_Aciel">
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="search">
        <i class="fas fa-search icon"></i>
        <input type="text" id="mysearch" class="form-control" placeholder="Bucar un archivo">
</div>
<ul id="showlist" tabindex="1" class="list-group"></ul>

    <div>
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
    </div>
</header>

<body>
    @yield('content')
    <script src="{{ asset('js/search.js') }}" type="module"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</body>


</html>
