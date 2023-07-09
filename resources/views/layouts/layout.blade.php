<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis Peques | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assests/css/bootstrap.min.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="small">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="text-size-adjust: 10px">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Mis Peques</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Inicio</a>
                    </li>
                    @yield('link')
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.cart') }}">Carrito</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.history') }}">Historial de compras</a>
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
                <form class="d-flex" method="POST" action="{{ route('search') }}">
                    @csrf
                    <input name="search" class="form-control me-2" type="search" placeholder="Buscar"
                        aria-label="Search">
                    <button class="btn btn-dark" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('assests/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
