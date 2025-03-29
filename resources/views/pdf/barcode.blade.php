<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ request()->barcode }}</title>
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
                height: auto;
            }

            #printButton {
                display: none;
            }
        }

        .container {
            text-align: center;
            padding: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <span style="font-weight: bold;">Rp. {{formatRupiah($price)}}</span>
        <br>
        <img id="barcode" alt="Barcode Generator TEC-IT"
            src="https://barcode.tec-it.com/barcode.ashx?data={{ $code }}&code=Code128&translate-esc=on" />
        <br>
        <button id="printButton" onclick="printBarcode()">Print</button>
    </div>

    <script>
        function printBarcode() {
            const barcode = document.getElementById('barcode');
            document.body.style.height = barcode.clientHeight + "px"; // Sesuaikan tinggi halaman dengan gambar
            window.print();
        }
    </script>

</body>

</html>
