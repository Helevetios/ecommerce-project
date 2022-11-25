<!doctype html>
<html lang="es">

<head>
    <title>Registro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assests/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <br><br><br>
                <div class="card">
                    <div class="card-header">
                        Registro
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Confirmar Contraseñas</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="phone">Telefono</label>
                                <input type="phone" name="phone" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input type="address" name="address" class="form-control">
                            </div>

                            <button class="btn btn-primary">Registrarse</button>

                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <script src="{{ asset('assests/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>