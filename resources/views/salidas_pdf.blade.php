<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Salidas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 150px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/ICECSA VARIABLE.png') }}" alt="Logo ICECSA">
    </div>
    <h1>Reporte de Salidas</h1>
    <table>
        <thead>
            <tr>
            <th>Código</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Unidad</th>
                <th>Salidas</th>
                <th>Fecha de salida</th>
                <th>Responsable de salida</th>
                <th>Destino de salida</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $registro)
            <tr>
            <td>{{ $registro->codigo }}</td>
                <td>{{ $registro->tipo }}</td>
                <td>{{ $registro->descripcion }}</td>
                <td>{{ $registro->unidad }}</td>
                <td>{{ $registro->salidas }}</td>
                <td>{{ $registro->fechasalida }}</td>
                <td>{{ $registro->responsablesalida }}</td>
                <td>{{ $registro->destinosalida }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
