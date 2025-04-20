@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box text-bg-primary py-4 d-flex align-items-center">
                    <div class="inner">
                        <h3>155</h3>
                        <p class="mb-0">Jumlah Siswa Terdaftar</p>
                    </div>
                    <i class="bi bi-cash-stack small-box-icon"></i>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box text-bg-warning py-4 d-flex align-items-center">
                    <div class="inner">
                        <h3>80</h3>
                        <p class="mb-0">Siswa Belum Membayar SPP</p>
                    </div>
                    <i class="bi bi-cash-stack small-box-icon"></i>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box text-bg-success py-4 d-flex align-items-center">
                    <div class="inner">
                        <h3>Rp20,000,000.-</h3>
                        <p class="mb-0">Pemasukan Bulan Ini</p>
                    </div>
                    <i class="bi bi-cash-stack small-box-icon"></i>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box text-bg-danger py-4 d-flex align-items-center">
                    <div class="inner">
                        <h3>Rp15,000,000.-</h3>
                        <p class="mb-0">Pengeluaran Bulan Ini</p>
                    </div>
                    <i class="bi bi-cash-stack small-box-icon"></i>
                </div>
            </div>
        </div>
    </div>
@endsection