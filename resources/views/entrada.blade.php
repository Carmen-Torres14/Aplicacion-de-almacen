<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada de Material</title>
    <link rel="stylesheet" href="{{ asset('css/entradasalida.css') }}">
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
    <h1>Entrada de Material</h1>
    <form action="{{ route('entrada.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="codigo">Código QR:</label>
            <input type="text" id="codigo" name="codigo" value="{{ $material ? $material->codigoqr : '' }}" required readonly>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" value="{{ $material ? $material->tipo : '' }}" required readonly>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" value="{{ $material ? $material->descripcion : '' }}" required readonly>
        </div>
        <div class="form-group">
            <label for="unidad">Unidad:</label>
            <input type="text" id="unidad" name="unidad" value="{{ $material ? $material->unidad : '' }}" required readonly>
        </div>
        <div class="form-group">
            <label for="entradas">Cantidad de Entradas:</label>
            <input type="number" id="entradas" name="entradas" required>
        </div>
        <div class="form-group">
            <label for="fechaentrada">Fecha de Entrada:</label>
            <input type="date" id="fechaentrada" name="fechaentrada" required>
        </div>
        <button type="submit" class="btn-submit">Registrar Entrada</button>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const material = JSON.parse(localStorage.getItem('material'));
        if (material) {
            document.getElementById('codigo').value = material.codigoqr;
            document.getElementById('tipo').value = material.tipo;
            document.getElementById('descripcion').value = material.descripcion;
            document.getElementById('unidad').value = material.unidad;
        }
    });
</script>
</body>
</html>
