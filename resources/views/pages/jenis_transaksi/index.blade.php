@extends('layouts.index')

@section('page-title', 'Master Data Jenis Transaksi')

@section('main-content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar pt-5">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                            <a href="{{ url('/') }}" class="text-gray-500">
                                <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Master Data</li>
                        <li class="breadcrumb-item">
                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-700">Jenis Transaksi</li>
                    </ul>
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Master Data Jenis Transaksi</h1>
                </div>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row gx-5 gx-xl-10">
                <div class="col-12">
                    <div class="card card-flush">
                        <div class="card-header pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Daftar Jenis Transaksi</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Daftar jenis transaksi yang terdaftar</span>
                            </h3>
                        </div>
                        <div class="card-body pt-6">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Jenis Transaksi</th>
                                            <th class="text-center">Kode Transaksi</th>
                                            <th>Nama Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($data as $item)
                                        <tr class="align-middle">
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td class="text-center">
                                                <span class="badge rounded-pill text-bg-{{ $item->jenis_transaksi == 'pengeluaran' ? 'danger' : 'success' }} text-white px-3">{{ Str::upper($item->jenis_transaksi) }}</span>
                                            </td>
                                            <td class="text-center">{{ $item->kode_transaksi }}</td>
                                            <td>{{ $item->nama_transaksi }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection