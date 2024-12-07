<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
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
    <div class="container">
        <h1>INICIA SESIÓN</h1>
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">CORREO:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">CONTRASEÑA:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">INGRESAR</button>
            </div>
        </form>
    </div>
</body>
</html>
