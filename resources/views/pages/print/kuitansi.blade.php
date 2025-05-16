<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuitansi Pembayaran</title>
    <style>
        @page {
            margin: 5mm 10mm;
            size: A5 landscape;

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
        table:not(.no-padding) th, table:not(.no-padding) td {
            padding: 4px 8px;
        }
        table thead tr th {
            border-top: 6px double #666;
            border-bottom: 6px double #666;
        }

        .header {
            position: running(header);
            width: 100%;
        }

        .bold {
            font-weight: bold;
        }

        h4 {
            margin: 0;
            padding-bottom: .5rem;
        }

        .text-center {
            text-align: center;
        }

        table.detail tr td:first-child {
            padding-left: 10mm;
        }
        table.detail tr td:last-child {
            padding-right: 10mm;
        }
        table.detail tr td {
            padding-top: 1mm;
            padding-bottom: 1mm;
        }
    </style>
</head>
<body>
    <div class="container">
        <table class="header no-padding">
            <tr>
                <td rowspan="2" style="width: 100px" class="text-center">
                    <img src="assets/images/logo-black.png" alt="Logo SMK Industri Mandiri" style="width: 80px">
                </td>
                <td style="vertical-align: bottom;">
                    <h1 style="margin: 0;">SMK Industri Mandiri</h1>
                </td>
            </tr>
            <tr>
                <td>
                    Belendung, Kec. Klari, Karawang, Jawa Barat 41371<br>
                    HP: 0813 3555 8484 | Website: www.smkindustrimandiri.sch.id | Instagram: @smksamrelkrw
                </td>
            </tr>
        </table>

        <table style="margin-top: 1rem;" class="detail">
            <tr>
                <td colspan="3" class="text-center" style="border-top: 4px double #333; border-bottom: 1px solid #333;">
                    <h3 style="margin: 0">BUKTI PEMBAYARAN</h3>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="width: 50mm;">NO TRANSAKSI</td>
                <td>: {{ $transaksi['nomor_transaksi'] }}</td>
            </tr>
            <tr>
                <td colspan="2">TANGGAL</td>
                <td>: {{ $transaksi['tanggal'] }}</td>
            </tr>
            <tr>
                <td colspan="2">NIS</td>
                <td>: {{ $siswa['nis'] }}</td>
            </tr>
            <tr>
                <td colspan="2">NAMA SISWA</td>
                <td>: {{ $siswa['nama_lengkap'] }}</td>
            </tr>
            <tr>
                <td colspan="2">TAHUN AJARAN</td>
                <td>: {{ $siswa['tahun_ajaran'] }}</td>
            </tr>
            <tr>
                <td colspan="2">JAM CETAK</td>
                <td>: {{ $printed_at }}</td>
            </tr>
            <tr style="border-top: 1px solid #333">
                <td colspan="2" style="padding: 1mm 0 1mm 10mm">
                    <h3 style="margin: 0"> Pembayaran Biaya {{ $nama_akun }}</h3>
                    {{ $transaksi['deskripsi'] }}
                </td>
                <td style="text-align: right; padding: 1mm 10mm 1mm 0">
                    <h3 style="margin: 0">Rp{{ number_format($nominal) }}</h3>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding: 1mm 10mm; border-top: 1px solid #333; border-bottom: 1px solid #333;">
                    <strong>TERBILANG:</strong>
                    {{ $terbilang }}
                </td>
            </tr>
        </table>

        <div style="margin-top: 3mm">
            Bukti pembayaran ini merupakan bukti pembayaran yang sah dan dibuat otomatis oleh sistem. Anda dapat mencetak bukti pembayaran ini atau menyimpannya dalam format PDF sebagai arsip.
        </div>

        <table style="width: 40mm; margin-left: auto; margin-top: 5mm;" class="text-center">
            <tr>
                <td>
                    <strong>Bendahara</strong>
                </td>
            </tr>
            <tr>
                <td style="height: 18mm">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    Dontol Kontol
                </td>
            </tr>
        </table>
    </div>
</body>
</html>