<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            /* font-family: Arial, sans-serif; */
            /* font familey sanserif monospace */
            font-family: 'monospaced', sans-serif;
            width: 58mm;
            margin: 0 auto;
        }

        .receipt {
            width: 58mm;
            padding: 10mm;
            margin: auto;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .receipt-title {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .receipt-date {
            text-align: center;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        .receipt-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            font-size: 1em;
        }

        .receipt-total {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            font-size: 1.1em;
            margin-top: 10px;
        }

        .receipt-footer {
            text-align: center;
            margin-top: 10px;
            font-size: 0.9em;
        }

        hr {
            border: 1px solid;
            border-top: 1px dashed #ddd;
            margin: 10px 0;
        }

        @media print {
            body {
                width: 58mm;
                /* Lebar konten */
                margin: 0 auto;
                /* Tambahkan properti untuk mengatur tinggi kertas jika perlu */
                height: auto;
                /* Biarkan browser menentukan tinggi secara otomatis */
            }

            /* Atur ukuran kertas secara spesifik jika diperlukan (misal: A4) */
            @page {
                size: 58mm auto;
                /* Lebar 58mm, tinggi otomatis */
            }

            .receipt {
                /* Gaya untuk elemen receipt */
                width: 100%;
                /* Agar elemen receipt memenuhi seluruh lebar */
            }

            .tombolPrint {
                display: none;
            }
        }
    </style>
</head>

<body onload="print()" style="color: black">
    <div class="text-center">
        <div>
            <img class="py-2" src="{{$headers['logo']}}" alt="" style="width: 50pt;">
            <h4 style="font-weight: bold;">{{ $headers['toko'] }}</h4>
            <p style="font-size: 10pt">
                Alamat : {{ $headers['alamat'] }}
                <br>
                Telp : {{ $headers['telpon'] }}
            </p>
        </div>
    </div>
    <hr>
    <div class="mb-3" style="color: black; font-size: 10pt">
        @foreach ($data->details as $item)
        <div class="py-1">
            <span class="">{{ $item->item_name }}</span>
            <i>
                {{ $item->status_costume ? ' - Costume Amount' : '' }}
                @if ($item->costume_status)
                <span class=""> - Costume</span>
                @endif
            </i>
            <div class="d-flex justify-content-between">
                <span>
                    {{ formatRupiah($item->cost_item + $item->costume_total) }}
                </span>
                <span>
                    x{{ $item->amount_item }}
                </span>
                <span>
                    {{ formatRupiah($item->total_cost) }}
                </span>
            </div>
        </div>
        @endforeach
    </div>
    <hr>
    <div class="py-2" style="font-size: 10pt">
        <div class="d-flex justify-content-between" style="font-weight: bold;">
            <span>
                Subtotal
            </span>
            <span>
                {{ number_format($data->total_payment) }}
            </span>
        </div>
        <div class="d-flex justify-content-between">
            <span>
                Payment Amount (pa)
            </span>
            <span>
                {{ number_format($data->payment->first()->payment_amount) }}
            </span>
        </div>
        <div class="d-flex justify-content-between">
            <span>
                Method
            </span>
            <span>
                @if ($data->payment->first()->payment_method === 't')
                    Tunai
                @endif
                @if ($data->payment->first()->payment_method === 'b')
                    Transfer
                @endif
                @if ($data->payment->first()->payment_method === 'q')
                    Qris
                @endif
            </span>
        </div>
        <div class="d-flex justify-content-between">
            <span>
                Discount (dc)
            </span>
            <span>
                {{ number_format($data->payment->first()->discount) }}
            </span>
        </div>
        <div class="d-flex justify-content-between">
            <span>
                Point (pt)
            </span>
            <span>
                {{ number_format($data->payment->first()->point) }}
            </span>
        </div>
        <div class="d-flex justify-content-between" style="font-weight: normal;">
            <span>
                Total Paid (pa + dc + pt)
            </span>
            <span>
                {{ number_format($data->total_paid) }}
            </span>
        </div>
        
        <div class="d-flex justify-content-between" style="font-weight: bold;">
            <span>
                Paid
            </span>
            <span>
                {{ number_format($data->total_paid - ($data->discount + $data->point)) }}
            </span>
        </div>
        <div class="d-flex justify-content-between">
            <span>
                Unpaid
            </span>
            <span class="">
                {{ number_format($data->total_unpaid) }}
            </span>
        </div>
    </div>


    <div style="text-align: center; margin-top: 20pt">
        <div style="text-align: center; margin-top: 15px">
            Terima Kasih!!!!
            <br>
            *** *** ***
        </div>
    </div>
    <div class="text-center mt-3 tombolPrint">
        <button class="btn btn-primary" onclick="window.print()">
            CETAK ULANG INVOICE
        </button>
    </div>
</body>

</html>