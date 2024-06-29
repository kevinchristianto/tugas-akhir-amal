<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 10pt;
        }
    </style>
</head>
<body>
    <table class="table table-bordered" width="100%" align="center" border="1" cellspacing="0" cellpadding="8">
        <tr align="center">
            <td>
                <h2>Laporan Transaksi<br>SDN Palumbonsari IV</h2>
                {{-- <hr> --}}
            </td>
        </tr>
    </table>
    <table class="table table-bordered" width="100%" align="center" border="1" cellspacing="0" cellpadding="8">
        <thead>
            <tr>
                <th width="5%">Tanggal Transaksi</th>
                <th width="15%">Deskripsi</th>
                <th width="5%">Debit</th>
                <th width="5%">Kredit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan as $item)
            <tr>
                <td>{{ date_format(date_create($item->tanggal_transaksi), 'd F Y') }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>Rp{{ $item->jenis_transaksi->jenis_transaksi == 'pemasukan' ? number_format($item->nominal) : '0' }}</td>
                <td>Rp{{ $item->jenis_transaksi->jenis_transaksi == 'pengeluaran' ? number_format($item->nominal) : '0' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div align="right">
        <h6>Tanda Tangan</h6>
        <br><br>
        <h6>Kepala Sekolah</h6>
    </div>
</body>
</html>