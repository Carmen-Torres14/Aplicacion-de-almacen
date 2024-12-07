<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
<header>
<div class="logo-container">
            <img src="{!! asset('images/ICECSA VARIABLE.png') !!}" alt="Logo ICECSA">
        </div>
        <nav>
            <ul>
            <li><a href="{{ route('index') }}">HOME</a></li>
                <li><a href="{{ route('register') }}">REGISTRAR USUARIO</a></li>
                <li><a href="{{ route('login') }}">INICIAR SESIÓN</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="register-container">
            <h2>REGISTRAR USUARIO</h2>
            <form action="{{ route('register.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">NOMBRE:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">CORREO:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">CONTRASEÑA:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">CONFIRMAR CONTRASEÑA:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit">REGISTRAR</button>
            </form>
        </section>
    </main>
</body>
</html>
