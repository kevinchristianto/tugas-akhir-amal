@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card dashnum-card overflow-hidden">
                    <span class="round small bg-danger"></span>
                    <span class="round big bg-danger"></span>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="avtar avtar-lg bg-light-danger">
                                    <i class="text-danger ti ti-user-square-rounded fs-1"></i>
                                </div>
                            </div>
                        </div>
                        <span class="d-block f-34 f-w-800 my-2 text-gray-700">
                            {{ number_format($total_siswa) }}
                        </span>
                        <h4 class="mb-0 opacity-50">Jumlah Siswa Terdaftar</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card dashnum-card overflow-hidden">
                    <span class="round small bg-warning"></span>
                    <span class="round big bg-warning"></span>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="avtar avtar-lg bg-light-warning">
                                    <i class="text-warning ti ti-school fs-1"></i>
                                </div>
                            </div>
                        </div>
                        <span class="d-block f-34 f-w-800 my-2 text-gray-700">
                            {{ number_format($total_guru) }}
                        </span>
                        <h4 class="mb-0 opacity-50">Jumlah Guru Terdaftar</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary-dark dashnum-card text-white overflow-hidden">
                    <span class="round small"></span>
                    <span class="round big"></span>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="avtar avtar-lg">
                                    <i class="text-white ti ti-coin fs-1"></i>
                                </div>
                            </div>
                        </div>
                        <span class="text-white d-block f-34 f-w-800 my-2">
                            Rp{{ number_format($pemasukan) }}
                        </span>
                        <h4 class="mb-0 opacity-50 text-white">Total Pemasukan Bulan Ini</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary-dark dashnum-card text-white overflow-hidden">
                    <span class="round small"></span>
                    <span class="round big"></span>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="avtar avtar-lg">
                                    <i class="text-white ti ti-coin-off fs-1"></i>
                                </div>
                            </div>
                        </div>
                        <span class="text-white d-block f-34 f-w-800 my-2">
                            Rp{{ number_format($pengeluaran) }}
                        </span>
                        <h4 class="mb-0 opacity-50 text-white">Total Pengeluaran Bulan Ini</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection