<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode {{ $barcode }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <span style="padding-bottom: 10px;">Rp. {{ formatRupiah($harga) }}</span>
    <img src="{{ $code }}" alt="" />
</body>

</html>
