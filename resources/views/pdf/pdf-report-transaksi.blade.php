<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            size: 330mm 210mm;
            margin: 30px 20px 30px 20px;
            margin-top: 0px;
        }

        html,
        body {
            margin-top: 17px !important;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        table {
            font-size: 10pt;
            width: 100%;
            /* border: 1px solid; */
            /* border-radius: 5px; */
            /* padding: 10px; */
            /* border-collapse: collapse; */
        }

        .table-data th {
            background-color: #ced5fb;
            /* color: #fff; */
            padding: 8px;
            text-align: left;
            /* border-bottom: 1px solid #ddd; */
        }

        .table-data td {
            padding: 8px;
            text-align: left;
            /* border-bottom: 1px solid #ddd; */
        }

        .title {
            text-align: left;
            font-size: 18px;
            margin-bottom: 25px;
        }

        .title h3 {
            font-weight: bold;
            margin-bottom: -5px;
        }

        .sub-title {
            margin-top: 10px;
            font-size: 14px;
        }

        .table-data thead {
            display: table-header-group;
        }

        tfoot {
            display: table-footer-group;
        }

        .page-break {
            page-break-inside: avoid;
            margin-top: 30px !important;
        }
    </style>
</head>

<body>
    <div class="title">
        <h3>{{ $title }}</h3>
        <div class="sub-title" style="margin-left: -2pt">
            <table>
                <tr>
                    <td style="width: 200px">Periode</td>
                    <td>: {{ $estimasi }}</td>
                </tr>
                <tr>
                    <td style="width: 100px">Selling</td>
                    <td>: RP. {{ formatRupiah($data['totalPenjualan']) }}</td>
                </tr>
                <tr>
                    <td style="width: 100px">Revenue</td>
                    <td>: Rp. {{ formatRupiah($data['totalPenerimaan']) }}</td>
                </tr>
                <tr>
                    <td style="width: 100px">Unpaid</td>
                    <td>: Rp. {{ formatRupiah($data['totalPiutang']) }}</td>
                </tr>
            </table>
        </div>
    </div>
    <table class="table-data">
        <thead>
            <tr>
                <th>No.</th>
                <th>Transaction Code</th>
                <th>Date</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Paid</th>
                <th>Unpaid</th>
                <th>Costumer</th>
            </tr>
        </thead>
        @php
            $number = 1;
        @endphp
        @foreach ($data['data'] as $item)
            <tr style="{{ $item->total_unpaid ? 'background: #feb2b2;' : '' }}">
                <td>{{ $number++ }}</td>
                <td>{{ $item->code }}</td>
                <td>{{ $item->transaction_date }}</td>
                <td>{{ $item->details->count() }}</td>
                <td>{{ formatRupiah($item->total_payment) }}</td>
                <td>{{ formatRupiah($item->total_paid) }}</td>
                <td>{{ formatRupiah($item->total_unpaid) }}</td>
                @if ($item->costumer)
                    <td>{{ $item->costumer->name }}</td>
                @else
                    <td>No customer found</td>
                @endif
            </tr>
        @endforeach
    </table>
    {{-- <div class="page-break"></div> --}}
</body>

</html>
