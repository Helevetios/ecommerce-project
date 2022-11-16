<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis Peques | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assests/css/bootstrap.min.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Mis Peques</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Inicio</a>
                    </li>
                    @yield('link')
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="#">Historial de compras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user') }}">Usuario</a>
                        </li>
                        @if (auth()->user()->role == '1')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin') }}">Administrar Sitio</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Cerrar Sesion</a>
                        </li>
                    @endauth

                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('assests/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>