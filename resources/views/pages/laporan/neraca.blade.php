@foreach($akun_neraca as $kategori => $akuns)
    <h4>{{ strtoupper($kategori) }}</h4>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Akun</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @php $totalKategori = 0; @endphp
            @foreach($akuns as $akun)
                <tr>
                    <td>{{ $akun->nama_akun }}</td>
                    <td style="text-align:right">
                        Rp {{ number_format($akun->saldo_akhir, 0, ',', '.') }}
                    </td>
                </tr>
                @php $totalKategori += $akun->saldo_akhir; @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td><strong>Total {{ ucfirst($kategori) }}</strong></td>
                <td style="text-align:right">
                    <strong>Rp {{ number_format($totalKategori, 0, ',', '.') }}</strong>
                </td>
            </tr>
        </tfoot>
    </table>
    <br>
@endforeach
