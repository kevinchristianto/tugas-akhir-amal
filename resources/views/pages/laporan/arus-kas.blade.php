@extends('layout.app')

@section('title', 'Arus Kas (Cashflow)')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Laporan</li>
    <li class="breadcrumb-item active" aria-current="page">Arus Kas (Cashflow)</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="card-title">Arus Kas (Cashflow) bulan {{ date('F Y') }}</h4>
                                <h5>Per {{ date('d F Y') }}</h5>
                            </div>
                            <a href="{{ route('laporan.arus-kas', ['mode' => 'print']) }}" class="btn btn-light-primary d-flex align-items-center gap-2">
                                <i class="ti ti-printer"></i>
                                Cetak
                            </a>
                        </div>
                        
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width: auto; white-space: nowrap">Tanggal</th>
                                    <th>Keterangan</th>
                                    <th class="text-end">Kas Masuk</th>
                                    <th class="text-end">Kas Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detail_kas as $item)
                                    <tr>
                                        <td>{{ date('d F Y', strtotime($item->transaksi->tanggal)) }}</td>
                                        <td>{{ $item->transaksi->deskripsi }}</td>
                                        <td class="text-end">
                                            {{ $item->debit > 0 ? 'Rp ' . number_format($item->debit, 0, ',', '.') : '' }}
                                        </td>
                                        <td class="text-end">
                                            {{ $item->kredit > 0 ? 'Rp ' . number_format($item->kredit, 0, ',', '.') : '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"><strong>Total</strong></td>
                                    <td class="text-end"><strong>Rp {{ number_format($kas_masuk, 0, ',', '.') }}</strong></td>
                                    <td class="text-end"><strong>Rp {{ number_format($kas_keluar, 0, ',', '.') }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Saldo Akhir</strong></td>
                                    <td class="text-end"><strong>Rp {{ number_format($saldo_akhir, 0, ',', '.') }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection