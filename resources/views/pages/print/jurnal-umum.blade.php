<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Jurnal Umum</title>
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
        <h1 style="margin: 0; text-align: center">Laporan Jurnal Umum bulan {{ date('F Y') }}</h1>
        <h2 style="margin: 0; text-align: center">SMK Industri Mandiri</h2>
        <h3 style="margin: 2mm 0 10mm; text-align: center">Per {{ date('d F Y') }}</h3>

        <table cellspacing="0">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Akun</th>
                    <th style="text-align: right;">Debit</th>
                    <th style="text-align: right;">Kredit</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalDebit = 0;
                    $totalKredit = 0;
                @endphp

                @foreach($transaksi as $item)
                    <tr style="border-bottom: 1px solid rgba(0, 0, 0, .1); border-top: 1px solid rgba(0, 0, 0, .1);">
                        <td>
                            <strong>{{ date('d F Y', strtotime($item->tanggal)) }}</strong>
                        </td>
                        <td colspan="4">
                            <strong>{{ $item->deskripsi }}</strong>
                        </td>
                    </tr>
                    @foreach($item->detail as $detail)
                        @php
                            $totalDebit += $detail->debit;
                            $totalKredit += $detail->kredit;
                        @endphp
                        <tr>
                            <td></td>
                            <td></td>
                            <td>{{ $detail->akun->nama_akun }}</td>
                            <td style="text-align: right">
                                {{ $detail->debit > 0 ? 'Rp' . number_format($detail->debit, 0, ',', '.') : '' }}
                            </td>
                            <td style="text-align: right">
                                {{ $detail->kredit > 0 ? 'Rp' . number_format($detail->kredit, 0, ',', '.') : '' }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                <tr style="font-weight:bold; background:#f0f0f0">
                    <td colspan="3" style="text-align: right">Total</td>
                    <td style="text-align: right">Rp{{ number_format($totalDebit, 0, ',', '.') }}</td>
                    <td style="text-align: right">Rp{{ number_format($totalKredit, 0, ',', '.') }}</td>
                </tr>
            </tbody>
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