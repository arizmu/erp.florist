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
            </table>
        </div>
    </div>
    <table class="table-data">
        <thead>
            <tr>
                <th>Code Bucket</th>
                <th>Bucket</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>tanggal</th>
                <th>Costumer</th>
                <th>Code Transaksi</th>
            </tr>
        </thead>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->code_product }}</td>
            <td>{{ $item->item_name }}</td>
            <td>Rp. {{ formatRupiah($item->cost_item) }}</td>
            <td>{{ $item->amount_item }}</td>
            <td>{{ $item->transaction->transaction_date }}</td>
            <td>{{ $item->transaction->costumer->name ?? '-' }}</td>
            <td>{{ $item->transaction->code }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>