@extends('layout.app')

@section('title', 'Jurnal Umum')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Laporan</li>
    <li class="breadcrumb-item active" aria-current="page">Jurnal Umum</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="card-title">Jurnal Umum bulan {{ date('F Y') }}</h4>
                                <h5>Per {{ date('d F Y') }}</h5>
                            </div>
                            <a href="{{ route('laporan.jurnal-umum', ['mode' => 'print']) }}" class="btn btn-light-primary d-flex align-items-center gap-2">
                                <i class="ti ti-printer"></i>
                                Cetak
                            </a>
                        </div>
                        
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Akun</th>
                                    <th class="text-end">Debit</th>
                                    <th class="text-end">Kredit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalDebit = 0;
                                    $totalKredit = 0;
                                @endphp

                                @foreach($transaksi as $item)
                                    <tr>
                                        <td rowspan="3">{{ date('d F Y', strtotime($item->tanggal)) }}</td>
                                        <td rowspan="3">{{ $item->deskripsi }}</td>
                                    </tr>
                                    @foreach($item->detail as $detail)
                                        @php
                                            $totalDebit += $detail->debit;
                                            $totalKredit += $detail->kredit;
                                        @endphp
                                        <tr>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection