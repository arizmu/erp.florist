<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        /* Mengatur ukuran kertas saat dicetak */
        @media print {
            @page {
                size: 57mm auto;
                /* Lebar 57mm, panjang menyesuaikan isi */
                margin: 0;
                /* Menghilangkan margin */
            }

            footer {
                display: none !important;
            }

            header {
                display: none !important;
            }

            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                width: 57mm;
                margin: 0;
                padding: 0px;
            }

            .nota {
                text-align: center;
                border-bottom: 1px dashed black;
                padding-bottom: 5px;
                margin-bottom: 5px;
            }

            .items {
                width: 100%;
                border-bottom: 1px dashed black;
                margin-bottom: 5px;
                padding-bottom: 5px;
            }

            .items td {
                padding: 3px;
            }

            .total {
                font-weight: bold;
                font-size: 13px;
            }

            /* Sembunyikan tombol cetak saat mencetak */
            .print-btn {
                display: none;
            }
        }

        /* Style untuk tampilan layar */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            width: 57mm;
            margin: auto;
            padding: 10px;
            background: #f8f8f8;
        }

        .nota {
            text-align: center;
            border-bottom: 1px dashed black;
            padding-bottom: 5px;
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;

            border-bottom: 1px dashed black;
        }

        .items td,
        .total td {
            padding: 3px;
        }

        .total {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            font-size: 11px;
            margin-top: 5px;
        }

        .print-btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-size: 14px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .print-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <section>
        <div style="text-align: center">
            <img src="https://cdn.pixabay.com/photo/2016/04/20/21/17/png-1342113_1280.png" alt=""
                class="max-w-20 object-cover" style="width: 50pt">
        </div>
        <div class="nota mt-2">
            <div class="flex gap-0 flex-col">
                <span class="capitalize font-semibold" style="font-size: 16px">** Naira Gift **</span>
                <span>- Craft & Flowrist -</span>
            </div>
            <p style="margin: 0;">Jl. Contoh No. 123, Kota</p>
        </div>

        <table class="items">
            @foreach ($data->details as $item)
                <tr class="">
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->amount_item }} x {{ $item->cost_item }}</td>
                    <td>{{ $item->total_cost }}</td>
                </tr>
            @endforeach
        </table>

        <table class="total">
            <tr>
                <td>Subtotal</td>
                <td style="text-align: right">{{ $data->total_payment }}</td>
            </tr>
            <tr>
                <td>Paid</td>
                <td style="text-align: right">{{ $data->total_paid }}</td>
            </tr>
            <tr>
                <td>Jumlah Bayar</td>
                <td style="text-align: right">{{ $data->payment->first()->total_paid }}</td>
            </tr>
            <tr>
                <td>Unpaid</td>
                <td style="text-align: right">{{ $data->total_unpaid }}</td>
            </tr>
        </table>

        <div class="footer flex gap-0 flex-col items-center align-middle">
            <span class="text-center">Terima kasih telah berbelanja!</span>
            {{-- <span>Hub : 078999</span> --}}
        </div>
    </section>
</body>

</html>
