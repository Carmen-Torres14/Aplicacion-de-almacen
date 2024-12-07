<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escanear Código QR</title>
    <link href="{{ asset('css/codigoqr.css') }}" rel="stylesheet">
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
        <h1>Escanear Código QR</h1>
        <div id="qr-reader"></div>
        <form id="qr-form" method="POST" action="{{ route('scan.qr') }}">
            @csrf
            <input type="hidden" id="qrData" name="qrData">
            <button type="submit" id="submitBtn" style="display: none;">Submit</button>
        </form>
        <div class="scan-result" id="scan-result"></div>
    </div>

    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2>ENTRADAS Y SALIDAS</h2>
        <div class="button-container">
            <button class="btn-entrada" id="btn-entrada">ENTRADA</button>
            <button class="btn-salida" id="btn-salida">SALIDA</button>
        </div>
      </div>
    </div>

    <script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            console.log(`Scan result: ${decodedText}`);
            document.getElementById('qrData').value = decodedText;
            fetchMaterialData(decodedText);
            modal.style.display = "block";
        }

        function fetchMaterialData(qrData) {
            $.ajax({
                url: '{{ route("scan.qr") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    qrData: qrData
                },
                success: function(response) {
                    if (response.status === 'success') {
                        localStorage.setItem('material', JSON.stringify(response.material));
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('Error al obtener los datos del material.');
                }
            });
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);

        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        document.getElementById('btn-entrada').onclick = function() {
            window.location.href = '{{ route("entrada") }}';
        }

        document.getElementById('btn-salida').onclick = function() {
            window.location.href = '{{ route("salida") }}';
        }
    </script>
</body>
</html>
