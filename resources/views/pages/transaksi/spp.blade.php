@extends('layout.app')

@section('title', 'Pembayaran SPP')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Transaksi</li>
    <li class="breadcrumb-item active" aria-current="page">Pembayaran SPP</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Pembayaran SPP</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('transaksi.store_spp') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="row mb-3">
                                <div class="col-12 col-lg-4 col-md-6 mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Diterima</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="col-12 col-lg-4 col-md-6 mb-3">
                                    <label for="nomor-transaksi" class="form-label">Kode Transaksi</label>
                                    <input type="text" class="form-control" id="nomor-transaksi" name="nomor_transaksi" required readonly value="{{ $nomor_transaksi }}">
                                    <small class="text-muted">Kode transaksi di-generate secara otomatis</small>
                                </div>
                                <div class="col-12 col-lg-4 col-md-6 mb-3">
                                    <label for="nama-siswa" class="form-label">Nama Siswa</label>
                                    <select name="siswa_id" id="nama-siswa" class="form-control" required>
                                        <option value selected disabled>--- Pilih siswa ---</option>
                                        @foreach ($siswa as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-lg-4 col-md-6 mb-3">
                                    <label for="akun-spp" class="form-label">Akun Keuangan SPP</label>
                                    <select name="akun_spp" id="akun-spp" class="form-control" required>
                                        @foreach ($akun_spp as $spp)
                                            <option value="{{ $spp->id }}">{{ $spp->kode_akun }} - {{ $spp->nama_akun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-lg-4 col-md-6 mb-3">
                                    <label for="akun-kas" class="form-label">Akun Keuangan Kas</label>
                                    <select name="akun_kas" id="akun-kas" class="form-control" required>
                                        <option value selected disabled>--- Pilih kas masuknya uang ---</option>
                                        @foreach ($akun_kas as $kas)
                                            <option value="{{ $kas->id }}">{{ $kas->kode_akun }} - {{ $kas->nama_akun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-lg-4 col-md-6 mb-3">
                                    <label for="nominal" class="form-label">Nominal</label>
                                    <input type="text" class="form-control currency" id="nominal" name="nominal" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button class="btn btn-primary d-flex align-items-center gap-2">
                                    <i class="ti ti-device-floppy"></i>
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/selectize/selectize.min.css') }}" />
@endsection

@section('custom-script')
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/selectize/selectize.min.js') }}"></script>
    <script>
        let options = {}
        $('select.form-control').selectize(options)

        $(document).ready(function () {
            $('.currency').inputmask({
                'alias': 'currency',
                'removeMaskOnSubmit': true,
                'autoUnmask': true,
                'digits': 2,
                'prefix': 'Rp',
                'rightAlign': false,
                'groupSeparator': '.',
                'radixPoint': ',',
                'digitsOptional': true,
            })
        })
    </script>
@endsection