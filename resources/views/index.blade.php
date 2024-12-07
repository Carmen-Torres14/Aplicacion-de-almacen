<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="{!! asset('images/ICECSA VARIABLE.png') !!}" alt="Logo ICECSA">
        </div>
        <nav>
            <div class="menu-toggle" id="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <ul id="menu" class="show">
                <li><a href="{{ route('index') }}">HOME</a></li>
                <li><a href="{{ route('inventario.index') }}">INVENTARIO</a></li>
                <li><a href="{{ route('register') }}">REGISTRAR USUARIO</a></li>
                <li><a href="{{ route('login') }}">INICIAR SESIÓN</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="main-content">
            <h1>BIENVENIDO</h1>
            <p>Aplicación de inventario ICECSA</p>
        </section>
        <div class="image-container">
            <img src="{!! asset('images/almacen.png') !!}" alt="Imagen del almacén">
        </div>
    </main>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('menu').classList.toggle('show');
        });
    </script>
</body>
</html>
