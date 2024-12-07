<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entradas</title>
    <link rel="stylesheet" href="{{ asset('css/entradassalidas.css') }}">
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
    <h1>Entradas</h1>
    <!--
    <div class="pdf-container">
        <a href="{{ route('entradas.pdf') }}" class="btn-pdf">
            <img src="{!! asset('images/pdf.jpg') !!}" alt="Generar PDF" class="pdf-icon"> Generar PDF
        </a>
    </div>
    -->
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Unidad</th>
                <th>Entradas</th>
                <th>Fecha de entrada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $registro)
            <tr>
                <td>{{ $registro->codigo }}</td>
                <td>{{ $registro->tipo }}</td>
                <td>{{ $registro->descripcion }}</td>
                <td>{{ $registro->unidad }}</td>
                <td>{{ $registro->entradas }}</td>
                <td>{{ $registro->fechaentrada }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
