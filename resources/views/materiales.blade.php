<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nuevo Material</title>
    <link rel="stylesheet" href="{{ asset('css/materiales.css') }}">
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
            @auth
                <li><a href="{{ route('inventario.index') }}">INVENTARIO</a></li>
                <li><a href="{{ route('materiales') }}">REGISTRAR MATERIAL</a></li>
                <li><a href="{{ route('entradas') }}">ENTRADAS</a></li>
                <li><a href="{{ route('salidas') }}">SALIDAS</a></li>
                <li><a href="{{ route('codigoqr') }}">ESCÁNER QR</a></li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-custom">SALIR</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>
    <div class="container">
        <h1>Registro de Nuevos Materiales y Herramientas</h1>
        <form action="{{ route('materiales.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="codigo">Código:</label>
                <input type="text" id="codigo" name="codigo" required>
            </div>
            <div class="form-group">
                <label for="almacen">Almacén:</label>
                <input type="text" id="almacen" name="almacen" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" name="tipo" required>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación:</label>
                <input type="text" id="ubicacion" name="ubicacion" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" required>
            </div>
            <div class="form-group">
                <label for="existencia">Existencia:</label>
                <input type="text" id="existencia" name="existencia" required>
            </div>
            <div class="form-group">
                <label for="unidad">Unidad:</label>
                <input type="text" id="unidad" name="unidad" required>
            </div>
            <div class="form-group">
                <label for="codigoqr">Código-QR:</label>
                <input type="text" id="codigoqr" name="codigoqr" required>
            </div>
            <div class="form-group">
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</body>
</html>
