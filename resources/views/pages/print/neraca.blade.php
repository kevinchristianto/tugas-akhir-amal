<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Neraca</title>
    <style>
        @page {
            margin: 10mm 20mm;
            size: A4;

            @top-center {
                content: element(header);
                width: 100%;
            }
        }

        #page-number {
            content: counter(page) " of " counter(pages);
        }

        body, html {
            font-size: 10pt;
            font-family: serif;
            min-height: 100%;
        }

        .container {
            min-height: 100%;
        }

        table {
            width: 100%;
        }
        table, th, td {
            border: none;
            /* border: solid 1px black; */
            border-spacing: 0;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 1mm 2mm;
        }
        table thead tr th {
            border-top: 3px double #666;
            border-bottom: 3px double #666;
        }

        .header {
            position: running(header);
            width: 100%;
        }

        .bold {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="margin: 0; text-align: center">Laporan Neraca Keuangan (Balance Sheet)</h1>
        <h2 style="margin: 0; text-align: center">SMK Industri Mandiri</h2>
        <h3 style="margin: 2mm 0 10mm; text-align: center">Per {{ date('d F Y') }}</h3>

        @foreach($akun_neraca as $kategori => $akun)
            <table style="margin-bottom: 5mm">
                <thead>
                    <tr>
                        <th style="text-align: left">{{ strtoupper($kategori) }}</th>
                        <th style="text-align: right">Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalKategori = 0; @endphp
                    @foreach($akun as $item)
                        <tr>
                            <td style="border-top: 1px solid rgba(0, 0, 0, .1);">{{ $item->nama_akun }}</td>
                            <td style="border-top: 1px solid rgba(0, 0, 0, .1); text-align:right">
                                Rp {{ number_format($item->saldo_akhir, 0, ',', '.') }}
                            </td>
                        </tr>
                        @php $totalKategori += $item->saldo_akhir; @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr style="border-top: 1px solid black">
                        <td><strong>Total {{ ucfirst($kategori) }}</strong></td>
                        <td style="text-align:right">
                            <strong>Rp {{ number_format($totalKategori, 0, ',', '.') }}</strong>
                        </td>
                    </tr>
                </tfoot>
            </table>
        @endforeach
        <table style="width: 200px; margin-left: auto; text-align: center; margin-top: 20mm">
            <tr>
                <td>Karawang, {{ date('d F Y') }}</td>
            </tr>
            <tr>
                <td style="height: 100px; vertical-align: bottom">{{ auth()->user()->name }}</td>
            </tr>
        </table>
    </div>
</body>
</html>