@extends('layout.app')

@section('title', 'Neraca (Balance Sheet)')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Laporan</li>
    <li class="breadcrumb-item active" aria-current="page">Neraca (Balance Sheet)</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title">Neraca Keuangan (Balance Sheet)</h4>
                                <p>Per {{ date('d F Y') }}</p>
                            </div>
                            <a href="{{ route('laporan.neraca', ['mode' => 'print']) }}" class="btn btn-light-primary d-flex align-items-center gap-2">
                                <i class="ti ti-printer"></i>
                                Cetak
                            </a>
                        </div>

                        @foreach($akun_neraca as $kategori => $akun)
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="p-1">{{ strtoupper($kategori) }}</th>
                                        <th class="p-1 text-end">Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $totalKategori = 0; @endphp
                                    @foreach($akun as $item)
                                        <tr>
                                            <td>{{ $item->nama_akun }}</td>
                                            <td class="text-end">
                                                Rp {{ number_format($item->saldo_akhir, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        @php $totalKategori += $item->saldo_akhir; @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Total {{ ucwords($kategori) }}</strong></td>
                                        <td class="text-end">
                                            <strong>Rp {{ number_format($totalKategori, 0, ',', '.') }}</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection