<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Label</title>
    <style>
        /* Sesuaikan dengan ukuran label */
        body {
            margin: 0;
            padding: 0;
            width: 198pt;
            height: 99pt;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* span {
            display: block;
            width: 100%;
            height: 100%;
        } */

        /* Pastikan barcode menyesuaikan ukuran label
        img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        } */
    </style>
</head>
<body>
    <span>
        {!! $barcode !!}
    </span>
</body>
</html>
