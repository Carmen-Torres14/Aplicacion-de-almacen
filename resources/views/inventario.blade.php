<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="{{ asset('css/inventario.css') }}">
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

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Almacén</th>
                <th>Tipo</th>
                <th>Ubicación</th>
                <th>Descripción</th>
                <th>Existencia</th>
                <th>Unidad</th>
                @auth
                    <th>Editar/eliminar</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach($materiales as $material)
            <tr>
                <td>{{ $material->codigo }}</td>
                <td>{{ $material->almacen }}</td>
                <td>{{ $material->tipo }}</td>
                <td>{{ $material->ubicacion }}</td>
                <td>{{ $material->descripcion }}</td>
                <td>{{ $material->existencia }}</td>
                <td>{{ $material->unidad }}</td>
                @auth
                    <td>
                        <a href="{{ route('materiales.edit', $material->id) }}" class="btn btn-edit">Editar</a>
                        <form action="{{ route('materiales.destroy', $material->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('¿Estás seguro de eliminar este material?');">Eliminar</button>
                        </form>
                    </td>
                @endauth
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('menu').classList.toggle('show');
    });
</script>
</body>
</html>
