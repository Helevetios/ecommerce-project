<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assests/css/bootstrap.min.css') }}">
</head>

<body>

    <div class="container">
        @if (Session::has('msg'))
        <br>
        <div class="alert alert-success">
            <h5>{!! \Session::get('msg') !!}</h5>
        </div>
        @endif
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <br><br><br>
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="/login" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div style="padding: 10px; padding-bottom: 10px">
                                <a href="{{ route('register') }}" class="align-items-center">Registrarse</a>
                            </div>
                            <br>
                            <button class="btn btn-primary">Iniciar Sesión</button>

                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <script src="{{ asset('assests/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>