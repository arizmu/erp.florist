<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembayaran</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Lilita+One&family=MuseoModerno:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .font-space {
            font-family: "Space Grotesk", sans-serif;
            font-optical-sizing: auto;
            font-weight: '';
            font-style: normal;
        }

        body {
            width: 80mm;
            margin: 0 auto;
        }
    </style>
</head>

<body class="p-4 font-space w-auto flex flex-col" onload="print()">
    <div for="header" class="flex flex-col gap-1 border-b pb-2 text-center">
        <h3 class="text-lg font-semibold">Niara Gift</h3>
        <div class="flex flex-col gap-0 text-xs">
            <span>Jl. Baji Gau Makassar</span>
            <span>Telpon : 08... | Email : niaragift@gmail.com</span>
        </div>
    </div>
    <div for="detail"></div>
    <div for="details" class="flex flex-col gap-1 py-2">
        <h4 class="font-semibold text-sm text-center">Details</h4>
        <span class="text-center text-xs" style="margin-top: -6pt">-----------------</span>
        <div class="flex flex-col gap-1 px-2">
            @foreach ($data->details as $item)
                <div class="flex justify-between items-end">
                    <div class="flex flex-col gap-0 text-start">
                        <span class="text-sm">{{ $item->item_name }}</span>
                        <i class="text-xs">Rp. {{ $item->cost_item }} * {{ $item->amount_item }}</i>
                    </div>
                    <span class="text-xs">Rp. {{$item->total_cost}}</span>
                </div>
            @endforeach
        </div>
    </div>
    <div for="payment" class="flex flex-col gap-0 px-2 border-t py-2">
        <div class="flex justify-end gap-6 font-semibold text-sm">
            <span>Subtotal</span>
            <span>Rp. {{$data->total_payment}}</span>
        </div>
        <div class="flex justify-end gap-6 font-semibold text-sm">
            <span>Paid</span>
            <span>Rp. {{$data->total_paid}}</span>
        </div>
        <div class="flex justify-end gap-6 font-semibold text-sm">
            <span>Cash</span>
            <span>Rp. {{$data->payment->first()->total_paid}}</span>
        </div>
        <div class="flex justify-end gap-6 font-semibold text-sm">
            <span>Unpaid</span>
            <span>Rp. {{$data->total_unpaid}}</span>
        </div>
    </div>
    <span class="text-center">-----------</span>
    <div for="header" class="flex flex-col gap-1 pb-2 text-center">
        <div class="flex flex-col gap-0 text-xs">
            <span class="font-semibold">Terimah kasih!</span>
            <span>Admin : helloworld</span>
        </div>
    </div>
</body>

</html>
