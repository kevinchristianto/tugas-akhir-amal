<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Arus Kas</title>
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
            text-align: left;
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
        <h1 style="margin: 0; text-align: center">Laporan Arus Kas (Cashflow) bulan {{ date('F Y') }}</h1>
        <h2 style="margin: 0; text-align: center">SMK Industri Mandiri</h2>
        <h3 style="margin: 2mm 0 10mm; text-align: center">Per {{ date('d F Y') }}</h3>

        <table>
            <thead>
                <tr>
                    <th style="width: auto; white-space: nowrap">Tanggal</th>
                    <th>Keterangan</th>
                    <th style="text-align: right;">Kas Masuk</th>
                    <th style="text-align: right;">Kas Keluar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detail_kas as $item)
                    <tr style="border-top: 1px solid rgba(0, 0, 0, .1);">
                        <td>{{ date('d F Y', strtotime($item->transaksi->tanggal)) }}</td>
                        <td>{{ $item->transaksi->deskripsi }}</td>
                        <td style="text-align: right">
                            {{ $item->debit > 0 ? 'Rp ' . number_format($item->debit, 0, ',', '.') : '' }}
                        </td>
                        <td style="text-align: right">
                            {{ $item->kredit > 0 ? 'Rp ' . number_format($item->kredit, 0, ',', '.') : '' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="border-top: 1px solid black">
                    <td colspan="2"><strong>Total</strong></td>
                    <td style="text-align: right"><strong>Rp {{ number_format($kas_masuk, 0, ',', '.') }}</strong></td>
                    <td style="text-align: right"><strong>Rp {{ number_format($kas_keluar, 0, ',', '.') }}</strong></td>
                </tr>
                <tr style="border-top: 1px solid black">
                    <td colspan="3"><strong>Saldo Akhir</strong></td>
                    <td style="text-align: right"><strong>Rp {{ number_format($saldo_akhir, 0, ',', '.') }}</strong></td>
                </tr>
            </tfoot>
        </table>

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