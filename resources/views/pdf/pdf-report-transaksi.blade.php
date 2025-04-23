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
                border-collapse: collapse;
            }

            .table-data th {
                background-color: #ced5fb;
                /* color: #fff; */
                padding: 8px;
                text-align: left;
                /* border-bottom: 1px solid #ddd; */
                border: 1pt;
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
                    <th>Date</th>
                    <th>Bucket Items</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Discout</th>
                    <th>Point</th>
                    <th>Paid</th>
                    <th>Unpaid</th>
                    <th>metode</th>
                    <th>Costumer</th>
                </tr>
            </thead>
            @php
                $number = 1;
            @endphp

            @foreach ($data['data'] as $item)
                <tr style="{{ $item['unpaid'] ? 'background: #feb2b2;' : '' }}">
                    <td style="vertical-align: top;">{{ $number++ }}</td>
                    <td style="vertical-align: top;">{{ $item['tanggal'] }}</td>
                    <td style="vertical-align: top; max-width: 300px;">
                        @foreach ($item['detail'] as $val)
                            [{{ $val['item_name'] }}]
                        @endforeach
                    </td>
                    <td style="vertical-align: top;">{{ $item['qty'] }}</td>
                    <td style="vertical-align: top;">{{ $item['subtotal'] }}</td>
                    <td style="vertical-align: top;">{{ $item['discount'] }}</td>
                    <td style="vertical-align: top;">{{ $item['point'] }}</td>
                    <td style="vertical-align: top;">{{ $item['paid'] }}</td>
                    <td style="vertical-align: top;">{{ $item['unpaid'] }}</td>
                    <td style="vertical-align: top; display: flex; flex-wrap: wrap;">
                        @foreach ($item['metode'] as $metode)
                            @if ($metode['payment_method'] == 't')
                                <span
                                    style="background-color: #e74c3c; color: white; padding: 3pt; border-radius: 5pt; font-size: 7pt;">
                                    {{ $metode['payment_method'] == 't' ? 'Tunai' : '' }} |
                                    {{ formatRupiah($metode['total_paid']) }}
                                </span>
                            @endif
                            @if ($metode['payment_method'] == 'b')
                                <span
                                    style="background-color: #27ae60; color: white; padding: 3pt; border-radius: 5pt; font-size: 7pt;">
                                    {{ $metode['payment_method'] == 'b' ? 'Transfer Bank' : '' }} |
                                    {{ formatRupiah($metode['total_paid']) }}
                                </span>
                            @endif
                            @if ($metode['payment_method'] == 'q')
                                <span
                                    style="background-color: #f39c12; color: white; padding: 3pt; border-radius: 5pt; font-size: 7pt;">
                                    {{ $metode['payment_method'] == 'q' ? 'Qris' : '' }} |
                                    {{ formatRupiah($metode['total_paid']) }}
                                </span>
                            @endif
                        @endforeach
                    </td>
                    <td style="vertical-align: top;">{{ $item['namaCustomer'] }}</td>
                </tr>
            @endforeach
        </table>
        {{-- <div class="page-break"></div> --}}
    </body>

</html>
