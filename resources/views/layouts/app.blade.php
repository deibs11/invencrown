<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

 

    <script src="https://cdn.jsdelivr.net/npm/js-loading-overlay@1.1.0/dist/js-loading-overlay.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-black shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold text-white" href="{{ url('/') }}">
                    Invencrown
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>

<style>
    .btn-lift {
        transition: transform 0.2s cubic-bezier(.4, 2, .6, 1);
    }

    .btn-lift:hover,
    .btn-lift:focus {
        transform: translateY(-6px) scale(1.04);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.10);
        z-index: 2;
    }

    .icon-btn {
        transition: transform 0.18s cubic-bezier(.4, 2, .6, 1);
        padding: 0.375rem 0.75rem;
        
    }

    .icon-btn:hover,
    .icon-btn:focus {
        transform: scale(1.25);
        z-index: 2;
    }

    .btn-update {
        background: #000;
        color: #fff;
        font-weight: 600;
        border: none;
        transition:
            background 0.3s cubic-bezier(.4, 2, .6, 1),
            color 0.3s cubic-bezier(.4, 2, .6, 1);
        position: relative;
        overflow: hidden;
    }

    .btn-update:hover,
    .btn-update:focus {
        background: #ffa500;
        /* naranja */
        color: #222;
    }

    .btn-update span {
        position: relative;
        z-index: 2;
    }

    @media (max-width: 575.98px) {
        h1.mb-4 {
            font-size: 1.5rem;
        }

        .table-responsive {
            font-size: 0.95rem;
        }

        /* Oculta columnas menos importantes en móvil */
        th.d-none,
        td.d-none {
            display: none !important;
        }

        /* Ajusta padding y tamaño de botones */
        .icon-btn,
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.95rem;
        }

        /* Permite scroll horizontal si es necesario */
        .table-responsive {
            overflow-x: auto;
        }
    }

    /* Opcional: fuerza ancho mínimo para celdas clave */
    td,
    th {
        white-space: nowrap;
    }
</style>

<script>
    // Show the loading overlay when the page starts loading
    document.addEventListener('DOMContentLoaded', function() {
        JsLoadingOverlay.show({
            'overlayBackgroundColor': '#666666',
            'overlayOpacity': 0.6,
            'spinnerIcon': 'ball-spin-clockwise',
            'spinnerColor': '#ffffff',
            'spinnerSize': '3x',
            'overlayIDName': 'overlay',
            'spinnerIDName': 'spinner',
            'offsetX': 0,
            'offsetY': 0,
            'containerID': null,
            'lockScroll': true,
            'overlayZIndex': 9999,
            'spinnerZIndex': 99999
        });

        // Hide the loading overlay after the page has fully loaded
        window.onload = function() {
            JsLoadingOverlay.hide();
        };
    });
</script>
