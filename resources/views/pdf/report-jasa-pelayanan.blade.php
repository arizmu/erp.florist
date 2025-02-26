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
                    <td style="width: 100px">Periode</td>
                    <td>: {{ $estimasi }}</td>
                    <td style="width: 120px">Jumlah Produksi</td>
                    <td style="width: 250px">: {{ $jumlahProduksi }}</td>
                    <td>Nilai Jual (Selesai)</td>
                    <td>: {{ formatRupiah($totalHarga) }} </td>
                </tr>
                <tr>
                    <td>Crafter</td>
                    <td>: {{ $crafter }}</td>
                    <td>Selesai</td>
                    <td>: {{ $jumlahSelesai }}</td>
                    <td>Jasa Crafter (selesai)</td>
                    <td>: {{ formatRupiah($totalJasa) }}</td>
                </tr>
            </table>
        </div>
    </div>
    <table class="table-data">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Nama Bukcet</th>
                <th>Nilai Jual</th>
                <th>Jasa Crafter</th>
                <th>Tanggal Produksi</th>
                <th>Status</th>
                <th>Crafter</th>
            </tr>
        </thead>
        @php
            $number = 1;
        @endphp
        @foreach ($data as $item)
            <tr style="{{ $item->production_status ? '' : 'background: #feb2b2;'  }}">
                <td>{{ $number++ }}</td>
                <td>{{ $item->code_production }}</td>
                <td style="word-wrap: break-word;">{{ $item->production_title }}</td>
                <td>{{ formatRupiah($item->price_for_sale) }}</td>
                <td>{{ formatRupiah($item->nilai_jasa_crafter) }}</td>
                <td>{{ $item->production_date }}</td>
                <td>{{ $item->production_status ? 'Selesai' : 'Tidak Selesai' }}</td>
                <td>{{ $item->crafter->pegawai_name }}</td>
            </tr>
        @endforeach
    </table>
    <div class="page-break"></div>
</body>

</html>
