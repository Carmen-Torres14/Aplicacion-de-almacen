<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Material</title>
    <link rel="stylesheet" href="{{ asset('css/editarmaterial.css') }}">
</head>
<body>
    <header>
    <div class="logo-container">
            <img src="{!! asset('images/ICECSA VARIABLE.png') !!}" alt="Logo ICECSA">
        </div>
    </header>
<div class="container">
    <h1>Editar Material</h1>
    <form action="{{ route('materiales.update', $material->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo" value="{{ $material->codigo }}" required>
        </div>
        <div>
            <label for="almacen">Almacén:</label>
            <input type="text" id="almacen" name="almacen" value="{{ $material->almacen }}" required>
        </div>
        <div>
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" value="{{ $material->tipo }}" required>
        </div>
        <div>
            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" value="{{ $material->ubicacion }}" required>
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" value="{{ $material->descripcion }}" required>
        </div>
        <div>
            <label for="existencia">Existencia:</label>
            <input type="number" id="existencia" name="existencia" value="{{ $material->existencia }}" required>
        </div>
        <div>
            <label for="unidad">Unidad:</label>
            <input type="text" id="unidad" name="unidad" value="{{ $material->unidad }}" required>
        </div>
        <div>
            <button type="submit">Guardar Cambios</button>
        </div>
    </form>
</div>
</body>
</html>
